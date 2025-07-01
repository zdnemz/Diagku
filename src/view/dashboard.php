<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css">
    <title><?= $title ?? "Diagku" ?></title>
</head>

<body>

    <?php include __DIR__ . '/../templates/header.php'; ?>

    <div class="min-h-screen bg-gradient-to-b from-blue-50 to-white p-6">
        <div class="max-w-4xl mx-auto">
            <h1 class="text-3xl font-bold text-gray-800 mb-4">👋 Selamat Datang, <?= $user['nama_lengkap'] ?></h1>
            <p class="text-gray-600 mb-6">Gunakan menu di bawah ini untuk memulai diagnosa atau melihat riwayat Anda.
            </p>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-10">
                <a href="/diagnosa"
                    class="bg-blue-600 text-white p-6 rounded-xl shadow hover:bg-blue-700 transition flex items-center justify-between">
                    <div>
                        <h2 class="text-xl font-semibold">🩺 Mulai Diagnosa</h2>
                        <p class="text-sm">Diagnosa berdasarkan gejala yang kamu alami.</p>
                    </div>
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>

                <a href="#riwayat"
                    class="bg-white border border-gray-200 p-6 rounded-xl shadow hover:shadow-lg transition flex items-center justify-between">
                    <div>
                        <h2 class="text-xl font-semibold">📚 Riwayat Diagnosa</h2>
                        <p class="text-sm text-gray-600">Lihat hasil diagnosa sebelumnya.</p>
                    </div>
                    <svg class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>

            <div id="riwayat" class="bg-white rounded-xl p-6 shadow border border-gray-200">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-2xl font-bold">Riwayat Diagnosa</h2>
                    <?php if (!empty($riwayat)): ?>
                        <button id="btnHapusRiwayat"
                            class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded transition">
                            Hapus Riwayat
                        </button>
                    <?php endif; ?>
                </div>

                <?php if (empty($riwayat)): ?>
                    <p class="text-gray-500">Kamu belum pernah melakukan diagnosa.</p>
                <?php else: ?>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-600 uppercase">Penyakit
                                    </th>
                                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-600 uppercase">Persentase
                                    </th>
                                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-600 uppercase">Gejala</th>
                                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-600 uppercase">Tanggal</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-100">
                                <?php foreach ($riwayat as $r): ?>
                                    <tr>
                                        <td class="px-4 py-2 text-sm text-gray-700"><?= $r['penyakit'] ?></td>
                                        <td class="px-4 py-2 text-sm text-gray-700"><?= $r['presentase_cf'] ?>%</td>
                                        <td class="px-4 py-2 text-sm text-gray-700">
                                            <?= htmlspecialchars($r['gejala']) ?>
                                        </td>
                                        <td class="px-4 py-2 text-sm text-gray-700">
                                            <?= date('d M Y', strtotime($r['tanggal'])) ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Modal Konfirmasi Hapus Riwayat -->
            <div id="modalHapusRiwayat"
                class="fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50 hidden">
                <div class="bg-white rounded-lg shadow-lg p-6 max-w-sm w-full">
                    <h3 class="text-lg font-semibold mb-4">Konfirmasi Hapus Riwayat</h3>
                    <p class="mb-6 text-gray-700">Apakah Anda yakin ingin menghapus semua riwayat diagnosa? Tindakan ini tidak dapat dibatalkan.</p>
                    <form method="post" action="/riwayat/hapus" class="flex justify-end space-x-3">
                        <button type="button" id="batalHapusRiwayat"
                            class="px-4 py-2 rounded bg-gray-200 hover:bg-gray-300 text-gray-700">Batal</button>
                        <button type="submit" class="px-4 py-2 rounded bg-red-500 hover:bg-red-600 text-white">Ya,
                            Hapus</button>
                    </form>
                </div>
            </div>

            <script>
                const btnHapus = document.getElementById('btnHapusRiwayat');
                const modalHapusRiwayat = document.getElementById('modalHapusRiwayat');
                const batal = document.getElementById('batalHapusRiwayat');
                if (btnHapus && modalHapusRiwayat && batal) {
                    btnHapus.addEventListener('click', () => {
                        modalHapusRiwayat.classList.remove('hidden');
                    });
                    batal.addEventListener('click', () => {
                        modalHapusRiwayat.classList.add('hidden');
                    });
                }

                <?php if (isset($_SESSION['eror'])) { ?>
                    {
                        alert("<?= addslashes($_SESSION['eror']) ?>");
                        <?php unset($_SESSION['eror']); ?>
                    }
                <?php } ?>

                <?php if (isset($_SESSION['sukses'])) { ?>
                    {
                        alert("<?= addslashes($_SESSION['sukses']) ?>");
                        <?php unset($_SESSION['sukses']); ?>
                    }
                <?php } ?>
            </script>
        </div>
    </div>

    <?php include __DIR__ . '/../templates/footer.php'; ?>

</body>

</html>