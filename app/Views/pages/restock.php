<div class="pl-[296px]">
    <div class="min-h-screen bg-[##EDF2F7] px-16 pt-10">
        <p class="font-bold text-[42px]">Standard Restock</p>
        <p class="text-xs font-thin text-gray-500">
            History / overview
        </p>
        <table class="table-auto w-full mt-4 rounded-2xl overflow-hidden bg-[#F3F3F3]">
            <thead class="bg-gray-50 border-b-2 border-gray-200">
                <tr>
                    <th class="text-center py-4">Nama</th>
                    <th class="text-center py-4">Stock</th>
                    <th class="text-center py-4">Batas Bawah</th>
                    <th class="text-center py-4">Kuantitas Restock</th>
                    <th class="text-center py-4"></th>
                    <th class="text-center py-4"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($produk as $p): ?>
                    <tr class="rounded-lg border-b-2 border-gray-200">
                        <td class="text-center py-4">
                            <?= $p['nama'] ?>
                        </td>
                        <td class="text-center py-4">
                            <?= $p['stock'] ?>
                        </td>
                        <td class="text-center py-4">
                            <?= $p['batas_bawah'] ?>
                        </td>
                        <td class="text-center py-4">
                            <?= $p['kuantitas_restock'] ?>
                        </td>
                        <td class="text-center py-4">
                            <a href="/pages/edit/<?= $p['id_produk'] ?>" class="bg-[#FFA500] rounded-lg p-1">Edit Data</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>