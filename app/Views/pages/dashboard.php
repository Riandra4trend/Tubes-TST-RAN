<div class=" bg-[#EDF2F7] min-h-screen ml-72 px-12 py-4">
    <div class="pl-12 py-4">
        <p class="text-4xl font-bold text-gray-800 py-4">
            dashboard
        </p>
        <p class="text-xs font-thin text-gray-500">
            dashboard / overview
        </p>
    </div>
    <form action="/purchase" method="post">
        <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">
        <input type="hidden" name="payment_method" id="paymentMethod" value="">
        <input type="hidden" name="selected_products[]" id="selectedProducts" value="{}">
        <input type="hidden" name="total_harga" id="totalHarga" value="0">
        <div class="flex flex-row ">
            <div class="flex flex-wrap mt-10 ">
                <div class="flex flex-wrap ml-5 gap-10">
                    <?php if ($produk && count($produk) > 0): ?>
                        <?php foreach ($produk as $idx => $jb): ?>
                            <div class="product-container" data-price="<?php echo $jb['harga']; ?>" data-index="<?php echo $idx; ?>"
                                data-stock="<?php echo $jb['stock']; ?>" class="hover:scale-[102%] transition">
                                <div class="bg-white rounded-t-[10px]">
                                    <img class="rounded-t-[10px] w-[220px] h-[187px] object-fill" src="<?php echo $jb['image']; ?>"
                                        alt="icon cart" width="220" height="187" />
                                </div>
                                <div class="py-7 px-3 w-full rounded-b-[10px] bg-[#B7F2D4] flex justify-between">
                                    <div class="flex flex-col gap-1">
                                        <p class="text-black font-semibold text-lg leading-tight">
                                            <?php echo $jb['nama']; ?>
                                        </p>
                                        <p class="text-black text-base font-medium leading-tight">
                                            <?php echo 'Rp ' . $jb['harga']; ?>
                                        </p>
                                    </div>
                                    <div class="flex flex-row gap-2">
                                        <button class="bg-sky-300 block p-1 rounded-[3px] my-auto add-button" type="button" onclick="addItem(this)">
                                            <img src="/icon/add.svg" alt="icon">
                                        </button>
                                        <p class="my-auto quantity" id="quantity_<?php echo $idx; ?>">0</p>
                                        <button class="bg-sky-300 block p-1 rounded-[3px] my-auto" type="button" onclick="reduceItem(this)">
                                            <img src="/icon/minus.svg" alt="icon">
                                        </button>
                                    </div>
    
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="flex flex-col items-center justify-center">
                            <h1 class="text-center text-xl text-black">
                                No data available
                            </h1>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
    
            <!-- menu pembayaran -->
            <div class="flex flex-col gap-3 mt-10">
                <div class="flex flex-col gap-2">
                    <h2 class="font-bold text-xl">Payment Method</h2>
                    <div class="flex flex-row justify-between bg-white rounded-lg shadow-lg p-2 cursor-pointer"
                        onclick="setPaymentMethod('QRIS')">
                        <div class="flex flex-row gap-1">
                            <img src="/icon/qris.svg" alt="logo" width="34" height="100">
                            <label class="text-black text-sm font-semibold cursor-pointer">
                                QRIS
                            </label>
                        </div>
                        <input class="scale-150" type="radio" value="QRIS" name="type">
                    </div>
    
                    <div class="flex flex-row justify-between bg-white rounded-lg shadow-lg p-2 cursor-pointer"
                        onclick="setPaymentMethod('DANA')">
                        <div class="flex flex-row gap-3">
                            <img src="/icon/dana.svg" alt="logo" width="25" height="100">
                            <label class="text-black text-sm pt-1 font-semibold cursor-pointer">
                                DANA
                            </label>
                        </div>
                        <input class="scale-150" type="radio" value="DANA" name="type">
                    </div>
    
                    <div class="flex flex-row justify-between bg-white rounded-lg shadow-lg p-2 cursor-pointer"
                        onclick="setPaymentMethod('OVO')">
                        <div class="flex flex-row gap-1.5">
                            <img src="/icon/ovo.svg" alt="logo" width="31" height="100">
                            <label class="text-black text-sm font-semibold cursor-pointer">
                                OVO
                            </label>
                        </div>
                        <input class="scale-150" type="radio" value="OVO" name="type">
                    </div>
    
                    <div class="flex flex-row justify-between bg-white rounded-lg shadow-lg p-2 cursor-pointer"
                        onclick="setPaymentMethod('GOPAY')">
                        <div class="flex flex-row gap-2.5">
                            <img src="/icon/gopay.svg" alt="logo" width="27" height="100">
                            <label class="text-black text-sm pt-1 font-semibold cursor-pointer">
                                GoPay
                            </label>
                        </div>
                        <input class="scale-150" type="radio" value="GOPAY" name="type">
                    </div>
    
                    <!-- add input promo and button -->
                    <div class="mt-3 flex flex-row justify-between bg-white rounded-lg shadow-lg p-2">
                        <div class="flex flex-row gap-1">
                            <img src="/icon/promo.svg" alt="logo" width="34" height="100">
                            <input type="text" placeholder="Add Promo"
                                class="w-full rounded-md px-4 py-2 ring-0 focus:outline-none text-slate-500">
                        </div>
                    </div>
                </div>
    
                <div class="flex flex-col bg-white rounded-lg shadow-lg p-4">
                    <h2 class="font-bold text-xl">Order Summary</h2>
    
                    <div class="mt-4 flex flex-col gap-4 text-slate-500">
                        <div class="flex flex-row justify-between">
                            <p>Subtotal</p>
                            <p id="orderTotalPrice">Rp 0</p>
                        </div>
    
                        <div class="flex flex-row justify-between">
                            <p>Service Charge</p>
                            <p id="serviceCharge">Rp 0</p>
                        </div>
                    </div>
    
                    <div class="mt-4 flex flex-col gap-4">
                        <hr class="border border-slate-300" />
                        <div class="flex flex-row justify-between">
                            <h2 class="text-xl">Order Total:</h2>
                            <h2 class="font-bold text-2xl" id="orderTotal">
                                Rp 0
                            </h2>
                        </div>
                        <hr class="border border-slate-300" />
                    </div>
    
                    <button
                        class="mt-4 text-center text-lg text-white bg-[#4353E4] rounded-2xl px-[24px] py-[8px] cursor-pointer select-none hover:bg-[#3e48a3] active:bg-[#353d89] transition" type="submit" onclick="return confirm('Apakah anda sudah yakin?')">
                        Pay
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
</div>
</div>
</div>

<script>
    // JavaScript functions to handle quantity changes
    function addItem(button) {
        var productContainer = button.closest('.product-container'); // Get the product container
        var quantityElement = productContainer.querySelector('.quantity'); // Get the quantity element
        var stock = parseInt(productContainer.getAttribute('data-stock'));

        // Check if both productContainer and quantityElement are found
        if (!productContainer || !quantityElement || isNaN(stock)) {
            console.error('Product container or quantity element not found.');
            return;
        }

        var currentQuantity = parseInt(quantityElement.innerText); // Get current quantity

        // Check if currentQuantity is a valid number
        if (isNaN(currentQuantity)) {
            console.error('Current quantity is not a valid number.');
            return;
        }

        if (currentQuantity < stock) {
            quantityElement.innerText = currentQuantity + 1;
            updateOrderSummary(updateSelectedProducts());
        } else {
            button.style.display = 'none';
        }
    }

    function reduceItem(button) {
        var quantityElement = button.parentElement.querySelector('.quantity'); // Get the quantity element
        var currentQuantity = parseInt(quantityElement.innerText); // Get current quantity

        // Ensure the quantity does not go below 0
        if (currentQuantity > 0) {
            // Update the quantity display
            quantityElement.innerText = currentQuantity - 1;

            // Update the order summary total price
            updateOrderSummary(updateSelectedProducts());

            var productContainer = button.closest('.product-container');
            var addButton = productContainer.querySelector('.add-button');
            if (addButton) {
                addButton.style.display = 'block';
            }
        }
    }

    function updateSelectedProducts() {
        var selectedProducts = {};

        // Loop through each item to get the selected quantity
        document.querySelectorAll('[data-index]').forEach(function (item) {
            var index = item.getAttribute('data-index');
            var quantityElement = item.querySelector('.quantity');

            // Check if quantityElement is defined and has a valid value
            var quantity = quantityElement ? parseInt(quantityElement.innerText.trim()) || 0 : 0;

            // Check if index is a valid number
            if (!isNaN(index)) {
                selectedProducts[index] = quantity; // Update selectedProducts object
            }
        });

        // Update the value of the selected_products input field
        document.getElementById('selectedProducts').value = JSON.stringify(selectedProducts);
    }

    function getSelectedPaymentMethod() {
        // Mengembalikan metode pembayaran yang dipilih
        var paymentMethodRadio = document.querySelector('input[name="type"]:checked');
        return paymentMethodRadio ? paymentMethodRadio.value : '';
    }

    function updateOrderSummary() {
        var subTotal = 0; // Rename to subTotal

        // Loop through each item to calculate the subTotal
        document.querySelectorAll('[data-price]').forEach(function (item) {
            var price = parseFloat(item.getAttribute('data-price'));
            var quantityElement = item.querySelector('.quantity');

            // Check if quantityElement is defined and has a valid value
            var quantity = quantityElement ? parseInt(quantityElement.innerText.trim()) || 0 : 0;

            // Check if both price and quantity are valid numbers
            if (!isNaN(price) && !isNaN(quantity)) {
                subTotal += price * quantity; // Accumulate subTotal
            }
        });

        // Calculate service charge (5% of subTotal)
        var serviceCharge = subTotal * 0.05;

        // Calculate total order price (subTotal + service charge)
        var totalOrderPrice = subTotal + serviceCharge;

        // Update the order summary subTotal, service charge, and total order price display
        document.getElementById('orderTotalPrice').innerText = formatCurrency(subTotal);
        document.getElementById('serviceCharge').innerText = formatCurrency(serviceCharge);
        document.getElementById('orderTotal').innerText = formatCurrency(totalOrderPrice);
        document.getElementById('totalHarga').value = totalOrderPrice;

        return totalOrderPrice;
    }

    function setPaymentMethod(method) {
        document.getElementById('paymentMethod').value = method;
        updateOrderSummary(); // Tambahkan ini agar total harga terupdate saat mengganti metode pembayaran
    }
    // Format currency function
    function formatCurrency(value) {
        return 'Rp ' + value.toLocaleString('id-ID');
    }
</script>