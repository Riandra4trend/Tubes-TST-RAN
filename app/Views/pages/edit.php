<div class="pl-[296px]">
    <div class="min-h-screen bg-[##EDF2F7] px-16 pt-10">
        <p class="font-bold text-[42px]">Edit Batas Bawah dan Kuantitas Produk</p>
        <form action="/pages/update/<?= $selectedProduk['id_produk'] ?>" method="POST">
            <?= csrf_field(); ?>
            <p class="mt-[26px] text-black text-lg font-normal">Batas Bawah</p>
            <div class="mt-2 bg-white rounded-lg ">
                <input type="number" id="batas_bawah" name="batas_bawah" placeholder="Batas Bawah baru"
                    class="border-2 border-black text-black pt-[15.57px] pb-[16.44px] pl-[22px] pr-[300px] rounded-lg"
                    value="<?= $selectedProduk['batas_bawah'] ?>">
            </div>
            <p class="mt-[26px] text-black text-lg font-normal">Kuantitas Produk</p>
            <div class="mt-2 bg-white rounded-lg ">
                <input type="number" id="kuantitas_restock" name="kuantitas_restock" placeholder="Kuantitas Restock baru"
                    class="border-2 border-black text-black pt-[15.57px] pb-[16.44px] pl-[22px] pr-[300px] rounded-lg"
                    value="<?= $selectedProduk['kuantitas_restock'] ?>">
            </div>
            <div class="mt-[26px]">
                <button type="submit" class="bg-blue-500 rounded-lg p-1 text-white" onclick="return confirm('Apakah anda yakin?')">Save New Data</button>
            </div>
        </form>
    </div>
</div>