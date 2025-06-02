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

        <div class="min-h-screen bg-gradient-to-b from-blue-50 to-white flex items-center justify-center px-4">
            <div class="max-w-3xl w-full bg-white shadow-2xl rounded-2xl p-8 border border-gray-100 text-center">
                <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">🧠 Sistem Pakar Diagnosa Penyakit</h1>
                <p class="text-gray-600 mb-6">
                    Selamat datang di sistem pakar berbasis web yang membantu Anda menganalisis gejala untuk mendeteksi
                    kemungkinan penyakit secara cepat dan akurat menggunakan metode <span
                        class="font-semibold text-blue-600">Certainty Factor</span>.
                </p>

                <div class="flex flex-col sm:flex-row justify-center gap-4">
                    <a href="/diagnosa"
                        class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-xl shadow hover:bg-blue-700 transition duration-200">
                        🔍 Mulai Diagnosa
                    </a>
                    <a href="/tentang"
                        class="px-6 py-3 bg-gray-100 text-gray-700 font-medium rounded-xl hover:bg-gray-200 transition">
                        ℹ️ Tentang Sistem
                    </a>
                </div>

                <div class="mt-10">
                    <img src="https://cdn-icons-png.flaticon.com/512/4149/4149623.png" alt="Diagnosa Icon"
                        class="mx-auto w-32 opacity-80">
                </div>
            </div>
        </div>

    <?php include __DIR__ . '/../templates/footer.php'; ?>

</body>

</html>