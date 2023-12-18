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
                    
                    <div class="mt-4 text-center text-lg text-white bg-[#4353E4] rounded-2xl px-[24px] py-[8px] cursor-pointer select-none hover:bg-[#3e48a3] active:bg-[#353d89] transition" onclick="confirmAndSubmitOrder()">
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
    var confirmationDialogOpen = false; // Flag to check if the confirmation dialog is open

    function addItem(button) {
        // Get the product container
        var productContainer = button.closest('.product-container');

        // Get the quantity element
        var quantityElement = productContainer.querySelector('.quantity');

        // Update the quantity display
        quantityElement.innerText = parseInt(quantityElement.innerText) + 1;

        // Update the order summary total price
        updateOrderSummary();
    }

    function reduceItem(button) {
        // Get the product container
        var productContainer = button.closest('.product-container');

        // Get the quantity element
        var quantityElement = productContainer.querySelector('.quantity');

        // Ensure the quantity does not go below 0
        if (parseInt(quantityElement.innerText) > 0) {
            // Update the quantity display
            quantityElement.innerText = parseInt(quantityElement.innerText) - 1;

            // Update the order summary total price
            updateOrderSummary();
        }
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
    }

    // Format currency function
    function formatCurrency(value) {
        return 'Rp ' + value.toLocaleString('id-ID');
    }

    function setPaymentMethod(method) {
        // Set the payment method
        var paymentMethodElements = document.getElementsByName('type');
        for (var i = 0; i < paymentMethodElements.length; i++) {
            paymentMethodElements[i].checked = paymentMethodElements[i].value === method;
        }

        // Update the order summary
        updateOrderSummary();
    }

    function getOrderDetails() {
        var details = '';

        // Loop through each item to gather details
        document.querySelectorAll('[data-price]').forEach(function (item) {
            var name = item.querySelector('.font-semibold').innerText.trim();
            var price = parseFloat(item.getAttribute('data-price'));
            var quantityElement = item.querySelector('.quantity');
            var quantity = quantityElement ? parseInt(quantityElement.innerText.trim()) || 0 : 0;

            // Check if both name, price, and quantity are valid
            if (name && !isNaN(price) && !isNaN(quantity) && quantity > 0) {
                details += name + ' x' + quantity + ' = ' + formatCurrency(price * quantity) + '\n';
            }
        });

        // Add subtotal, service charge, and total order price
        details += '\nSubtotal: ' + document.getElementById('orderTotalPrice').innerText;
        details += '\nService Charge: ' + document.getElementById('serviceCharge').innerText;
        details += '\nOrder Total: ' + document.getElementById('orderTotal').innerText;

        // Add selected payment method
        var paymentMethodElements = document.getElementsByName('type');
            for (var i = 0; i < paymentMethodElements.length; i++) {
                if (paymentMethodElements[i].checked) {
                    details += '\nPayment Method: ' + paymentMethodElements[i].value;
                    break;
                }
            }

        return details;
    }

    function confirmAndSubmitOrder() {
        // Check if a payment method is selected
        var selectedPaymentMethod = document.querySelector('input[name="type"]:checked');

        if (!selectedPaymentMethod) {
            // No payment method selected, show alert and return
            alert('Silakan pilih metode pembayaran terlebih dahulu.');
            return;
        }

        // Gather order details
        var orderDetails = getOrderDetails();

        // Show a confirmation dialog with order details
        var isConfirmed = confirm('Apakah Anda yakin mau memesan ini?\n\n' + orderDetails);

        // Check the user's choice
        if (isConfirmed) {
            // User clicked OK, proceed with order submission
            submitOrder();
        } else {
            // User clicked Cancel, do nothing or show a message
            console.log('Order submission canceled by the user');
        }
    }

    

</script>