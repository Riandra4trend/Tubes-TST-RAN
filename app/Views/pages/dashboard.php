    <div class="flex-col flex-wrap justify-between bg-[#EDF2F7] min-h-screen left-72 px-12 py-4">

        <!-- Header Section -->
        

        <!-- Product Display -->

        <!-- Product Display -->
        <div class="flex flex-wrap gap-10 mt-10">
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
                        <div class="py-7 px-5 w-full rounded-b-[10px] bg-[#B7F2D4] flex justify-between">
                            <div class="flex flex-col gap-1">
                                <p class="text-black font-semibold text-lg leading-tight">
                                    <?php echo $jb['nama']; ?>
                                </p>
                                <p class="text-black text-base font-medium leading-tight">
                                    <?php echo 'Rp ' . $jb['harga']; ?>
                                </p>
                            </div>
                            <button
                                class="bg-sky-300 block p-1 rounded-[3px] my-auto"
                            >
                                <img src="/icon/add.svg" alt="icon">
                            </button>
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
    </div>