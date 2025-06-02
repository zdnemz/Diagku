<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css">
    <title><?= $title ?? "Diagku" ?></title>
</head>

<body>

    <?php include __DIR__ . '/../../templates/header.php'; ?>

        <div class="max-w-3xl mx-auto mt-10 p-6 bg-white shadow-xl rounded-2xl border border-gray-100">
            <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">📋 Hasil Diagnosa</h2>

            <?php if (empty($hasil)): ?>
                <div class="text-center text-gray-600 bg-yellow-50 border border-yellow-300 p-4 rounded-lg">
                    Tidak ada gangguan terdeteksi berdasarkan gejala yang dipilih.
                </div>
            <?php else: ?>
                <div class="overflow-x-auto">
                    <table class="min-w-full border border-gray-200 rounded-lg overflow-hidden">
                        <thead class="bg-blue-600 text-white text-left">
                            <tr>
                                <th class="px-4 py-3">Kode</th>
                                <th class="px-4 py-3">Penyakit</th>
                                <th class="px-4 py-3 text-right">Persentase CF (%)</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white text-gray-700">
                            <?php foreach ($hasil as $row): ?>
                                <tr class="hover:bg-blue-50 transition">
                                    <td class="px-4 py-3 font-medium"><?= $row['kode'] ?></td>
                                    <td class="px-4 py-3"><?= $row['nama'] ?></td>
                                    <td class="px-4 py-3 text-right"><?= $row['cf'] ?>%</td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="mt-6 text-center">
                    <a href="/dashboard"
                        class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-xl shadow hover:bg-blue-700 transition duration-200">
                        ⬅️ Kembali ke Dashboard
                    </a>
                </div>

                <div class="mt-8 p-6 bg-blue-50 border border-blue-200 rounded-xl text-gray-800">
                    <h3 class="text-lg font-semibold mb-2">Catatan:</h3>
                    <p>
                        Hasil diagnosa di atas merupakan estimasi berdasarkan gejala yang Anda pilih.
                        Untuk diagnosis yang lebih akurat dan penanganan lebih lanjut, silakan konsultasikan dengan tenaga
                        medis profesional.
                    </p>
                </div>
            <?php endif; ?>
        </div>

    <?php include __DIR__ . '/../../templates/footer.php'; ?>

</body>

</html>