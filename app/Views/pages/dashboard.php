
<div class="flex flex-wrap justify-between bg-[#EDF2F7] min-h-screen ml-72 px-12 py-4">

        <!-- Header Section -->
        

        <!-- Product Display -->

        <!-- Product Display -->
        <div class="flex flex-wrap ml-5 gap-10 mt-10">
            <?php if ($produk && count($produk) > 0): ?>
                <?php foreach ($produk as $idx => $jb): ?>
                    <div key="<?php echo $idx; ?>" class="hover:scale-[102%] transition">
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
                            <button
                                class="bg-sky-300 block p-1 rounded-[3px] my-auto"
                                >
                                <img src="/icon/add.svg" alt="icon">
                            </button>
                            <p class="my-auto">0</p>
                            <button
                                class="bg-sky-300 block p-1 rounded-[3px] my-auto"
                                >
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

<!-- menu pembayaran -->
<div class="flex flex-col gap-3">
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
                <p>Rp $totalPrice ?></p>
            </div>

            <div class="flex flex-row justify-between">
                <p>Service Charge</p>
                <p>Rp $totalPrice * 0.05 ?></p>
            </div>
        </div>

        <div class="mt-4 flex flex-col gap-4">
            <hr class="border border-slate-300" />
            <div class="flex flex-row justify-between">
                <h2 class="text-xl">Order Total:</h2>
                <h2 class="font-bold text-2xl">
                    Rp $totalPrice + $totalPrice * 0.05 ?>
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