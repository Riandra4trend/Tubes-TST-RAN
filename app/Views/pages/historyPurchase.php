<!-- historyPurchase.php view -->
<div class="ml-72 min-h-screen bg-[#EDF2F7]">
    <div class="pl-12 py-4">
        <p class="text-4xl font-bold text-gray-800 py-4">
            History Purchase
        </p>
        <p class="text-xs font-thin text-gray-500">
            History purchase / overview
        </p>
    </div>
    <div class="px-12 pt-2">
        <table class="table-auto w-full mt-4 rounded-2xl overflow-hidden bg-[#F3F3F3]">
            <thead class="bg-gray-50 border-b-2 border-gray-200">
                <tr>
                    <th class="text-center py-4">Order ID</th>
                    <th class="text-center py-4">ID Kasir</th>
                    <th class="text-center py-4">Detail Order</th>
                    <th class="text-center py-4">Total Price</th>
                    <th class="text-center py-4">Metode Pembayaran</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($transactions as $transaction) : ?>
                    <tr class="rounded-lg bg-[#F3F3F3] border-b-2 border-gray-200">
                        <td class="text-center py-4"><?= $transaction['id_transaksi'] ?></td>
                        <td class="text-center py-4"><?= $transaction['id_karyawan'] ?></td>
                        <td class="text-center py-4">
                        <?php
                            echo $transaction['nama'] . ' x' . $transaction['kuantitas'];
                        ?>
                        </td>
                        <td class="text-center py-4"><?= $transaction['total_harga'] ?></td>
                        <td class="text-center py-4"><?= $transaction['metode_pembayaran'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
