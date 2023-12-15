<div class="pl-[296px]">
    <div class="min-h-screen bg-[##EDF2F7] px-16 pt-10">
        <p class="font-bold text-[42px]">Standard Restock</p>
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
            <?php foreach ($produk as $p):?>
                    <tr class="rounded-lg border-b-2 border-gray-200">
                        <td class="text-center py-4"><?= $p['nama'] ?></td>
                        <td class="text-center py-4"><?= $p['stock'] ?></td>
                        <?php if (isset($p['edit_mode']) && $p['edit_mode']): ?>
                            <!-- Edit mode: Show input fields for editing -->
                            <td class="text-center py-4">
                                <input type="text" name="batas_bawah" value="<?= $p['batas_bawah'] ?>">
                            </td>
                            <td class="text-center py-4">
                                <input type="text" name="kuantitas_restock" value="<?= $p['kuantitas_restock'] ?>">
                            </td>
                        <?php else: ?>
                            <!-- View mode: Show normal text -->
                            <td class="text-center py-4"><?= $p['batas_bawah'] ?></td>
                            <td class="text-center py-4"><?= $p['kuantitas_restock'] ?></td>
                        <?php endif; ?>
                        <td class="text-center py-4">
                            <?php if (!isset($p['edit_mode']) || !$p['edit_mode']): ?>
                                <button onclick="toggleEditMode(<?= $p['id_produk'] ?>)" class="bg-[#FFA500] rounded-lg p-1">Edit Form</button>
                            <?php else: ?>
                                <button>Save</button>
                            <?php endif; ?>
                        </td>
                        <td class="text-center py-4">
                            <!-- Add cancel button if in edit mode -->
                            <?php if (isset($p['edit_mode']) && $p['edit_mode']): ?>
                                <button onclick="toggleEditMode(<?= $p['id_produk'] ?>)">Cancel</button>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
</div>

<script>
    function toggleEditMode(id) {
        // Send an AJAX request to update the edit_mode status in the backend
        // For simplicity, I'll use a hypothetical endpoint "/toggleEditMode"
        fetch('/toggleEditMode/' + id, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
        })
            .then(response => response.json())
            .then(data => {
                // Assuming the response contains updated data, you might need to handle it accordingly
                // For simplicity, I'm reloading the page here, but you may want to update the specific row in the table
                location.reload();
            })
            .catch((error) => {
                console.error('Error:', error);
            });
    }
</script>