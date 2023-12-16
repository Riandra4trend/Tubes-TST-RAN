<div class=" bg-[#EDF2F7] min-h-screen ml-72 px-12 py-4">
    <div class="pl-12 py-4">
        <p class="text-4xl font-bold text-gray-800 py-4">
            dashboard
        </p>
        <p class="text-xs font-thin text-gray-500">
            dashboard / overview
        </p>
    </div>
    <div class="flex flex-row ">
        
        <div class="flex flex-wrap mt-10 ">
            <div class="flex flex-wrap ml-5 gap-10">
                <?php if ($produk && count($produk) > 0): ?>
                    <?php foreach ($produk as $idx => $jb): ?>
                        <div class="product-container" data-price="<?php echo $jb['harga']; ?>" data-index="<?php echo $idx; ?>" class="hover:scale-[102%] transition">
                            <div class="bg-white rounded-t-[10px]">
                                <img
                                class="rounded-t-[10px] w-[220px] h-[187px] object-fill"
                                src="<?php echo $jb['image']; ?>"
                                alt="icon cart"
                                width="220"
                                height="187"
                                />
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
                                <button class="bg-sky-300 block p-1 rounded-[3px] my-auto" onclick="addItem(this)">
                                <img src="/icon/add.svg" alt="icon">
                                </button>
                                <p class="my-auto quantity" id="quantity_<?php echo $idx; ?>">0</p>
                                <button class="bg-sky-300 block p-1 rounded-[3px] my-auto" onclick="reduceItem(this)">
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
                    
                    <div class="flex flex-row justify-between bg-white rounded-lg shadow-lg p-2 cursor-pointer" onclick="setPaymentMethod('QRIS')">
                        <div class="flex flex-row gap-1">
                            <img src="/icon/qris.svg" alt="logo" width="34" height="100">
                            <label class="text-black text-sm font-semibold cursor-pointer">
                                QRIS
                            </label>
                        </div>
                        <input class="scale-150" type="radio" value="QRIS" name="type">
                    </div>
                    
                    <div class="flex flex-row justify-between bg-white rounded-lg shadow-lg p-2 cursor-pointer" onclick="setPaymentMethod('DANA')">
                        <div class="flex flex-row gap-3">
                            <img src="/icon/dana.svg" alt="logo" width="25" height="100">
                            <label class="text-black text-sm pt-1 font-semibold cursor-pointer">
                                DANA
                            </label>
                        </div>
                        <input class="scale-150" type="radio" value="DANA" name="type">
                    </div>
                    
                    <div class="flex flex-row justify-between bg-white rounded-lg shadow-lg p-2 cursor-pointer" onclick="setPaymentMethod('OVO')">
                        <div class="flex flex-row gap-1.5">
                            <img src="/icon/ovo.svg" alt="logo" width="31" height="100">
                            <label class="text-black text-sm font-semibold cursor-pointer">
                                OVO
                            </label>
                        </div>
                        <input class="scale-150" type="radio" value="OVO" name="type">
                    </div>
                    
                    <div class="flex flex-row justify-between bg-white rounded-lg shadow-lg p-2 cursor-pointer" onclick="setPaymentMethod('GOPAY')">
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
                            <input type="text" placeholder="Add Promo" class="w-full rounded-md px-4 py-2 ring-0 focus:outline-none text-slate-500" >
                        </div>
                    </div>
                </div>
                
                <div class="flex flex-col bg-white rounded-lg shadow-lg p-4">
                    <h2 class="font-bold text-xl">Order Summary</h2>
                    
                    <div class="mt-4 flex flex-col gap-4 text-slate-500">
                        <div class="flex flex-row justify-between">
                            <p>Items</p>
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
                    
                    <div class="mt-4 text-center text-lg text-white bg-[#4353E4] rounded-2xl px-[24px] py-[8px] cursor-pointer select-none hover:bg-[#3e48a3] active:bg-[#353d89] transition" >
                        Pay
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>

<script>
    // JavaScript functions to handle quantity changes
    function addItem(button) {
        var productContainer = button.closest('.product-container'); // Get the product container
        var quantityElement = productContainer.querySelector('.quantity'); // Get the quantity element

        // Check if both productContainer and quantityElement are found
        if (!productContainer || !quantityElement) {
            console.error('Product container or quantity element not found.');
            return;
        }

        var currentQuantity = parseInt(quantityElement.innerText); // Get current quantity

        // Check if currentQuantity is a valid number
        if (isNaN(currentQuantity)) {
            console.error('Current quantity is not a valid number.');
            return;
        }

        // Update the quantity display
        quantityElement.innerText = currentQuantity + 1;

        // Update the order summary total price
        updateOrderSummary();
    }

    function reduceItem(button) {
        var quantityElement = button.parentElement.querySelector('.quantity'); // Get the quantity element
        var currentQuantity = parseInt(quantityElement.innerText); // Get current quantity

        // Ensure the quantity does not go below 0
        if (currentQuantity > 0) {
            // Update the quantity display
            quantityElement.innerText = currentQuantity - 1;

            // Update the order summary total price
            updateOrderSummary();
        }
    }

    function updateOrderSummary() {
        var totalPrice = 0;

        // Loop through each item to calculate the total price
        document.querySelectorAll('[data-price]').forEach(function (item) {
            var price = parseFloat(item.getAttribute('data-price'));
            var quantityElement = item.querySelector('.quantity');

            // Check if quantityElement is defined and has a valid value
            var quantity = quantityElement ? parseInt(quantityElement.innerText.trim()) || 0 : 0;

            // Check if both price and quantity are valid numbers
            if (!isNaN(price) && !isNaN(quantity)) {
                totalPrice += price * quantity;
            }
        });

        // Calculate service charge (5% of total price)
        var serviceCharge = totalPrice * 0.05;

        // Calculate total order price (total price + service charge)
        var totalOrderPrice = totalPrice + serviceCharge;

        // Update the order summary total price and service charge display
        document.getElementById('orderTotalPrice').innerText = formatCurrency(totalOrderPrice);
        document.getElementById('serviceCharge').innerText = formatCurrency(serviceCharge);
        document.getElementById('orderTotal').innerText = formatCurrency(totalOrderPrice);
    }

    // Format currency function
    function formatCurrency(value) {
        return 'Rp ' + value.toLocaleString('id-ID');
    }
</script>