<?php
require_once __DIR__ . '/../config/helpers.php';
requireLogin();
$pageTitle = 'Edukasi Kesehatan';

include __DIR__ . '/../includes/header.php';
include __DIR__ . '/../includes/sidebar.php';
?>

<!-- Topbar -->
<div class="topbar">
    <h2>📚 Edukasi Kesehatan Jantung</h2>
</div>

<div class="content-area">

    <!-- Apa itu BPM -->
    <div class="card">
        <div class="card-header">
            <h3>💓 Apa Itu BPM?</h3>
        </div>
        <div class="card-body">
            <p style="font-size: 0.95rem; color: var(--dark-2); line-height: 1.8;">
                <strong>BPM (Beats Per Minute)</strong> adalah satuan yang digunakan untuk mengukur detak jantung, yaitu jumlah detak jantung dalam satu menit. Detak jantung merupakan indikator penting untuk menilai kondisi kesehatan kardiovaskular seseorang. Pengukuran BPM dapat dilakukan dengan berbagai cara, mulai dari menghitung denyut nadi secara manual hingga menggunakan perangkat sensor digital seperti pulse oximeter atau smartwatch.
            </p>
            <p style="font-size: 0.95rem; color: var(--dark-2); line-height: 1.8; margin-top: 12px;">
                Pada orang dewasa yang sehat dan dalam keadaan istirahat, detak jantung normal berkisar antara <strong>60–100 BPM</strong>. Namun, nilai ini bisa berbeda-beda tergantung pada usia, tingkat kebugaran, aktivitas fisik, dan kondisi kesehatan.
            </p>
        </div>
    </div>

    <!-- Kategori BPM -->
    <div class="card">
        <div class="card-header">
            <h3>📊 Kategori Detak Jantung</h3>
        </div>
        <div class="card-body">
            <div class="bpm-range">
                <div class="range-item range-low">
                    <span class="range-value" style="color: #92400e;">⚠️ &lt; 60</span>
                    <span class="range-label" style="color: #92400e;">Rendah</span>
                    <span class="range-desc">Bradikardia</span>
                </div>
                <div class="range-item range-normal">
                    <span class="range-value" style="color: #065f46;">✅ 60–100</span>
                    <span class="range-label" style="color: #065f46;">Normal</span>
                    <span class="range-desc">Rentang sehat</span>
                </div>
                <div class="range-item range-high">
                    <span class="range-value" style="color: #991b1b;">🔴 &gt; 100</span>
                    <span class="range-label" style="color: #991b1b;">Tinggi</span>
                    <span class="range-desc">Takikardia</span>
                </div>
            </div>

            <div class="edu-grid" style="margin-top: 20px;">
                <div class="card edu-card" style="margin-bottom: 0;">
                    <h3 style="color: #92400e;">⚠️ Bradikardia (BPM &lt; 60)</h3>
                    <p style="font-size: 0.92rem; color: var(--dark-2); line-height: 1.7;">
                        Bradikardia adalah kondisi di mana detak jantung lebih lambat dari normal (di bawah 60 BPM). Kondisi ini bisa terjadi pada atlet terlatih sebagai hal normal, namun juga bisa menjadi tanda gangguan pada sistem kelistrikan jantung. Gejala yang mungkin muncul antara lain pusing, lemas, dan sesak napas.
                    </p>
                </div>

                <div class="card edu-card" style="margin-bottom: 0;">
                    <h3 style="color: #065f46;">✅ Normal (BPM 60–100)</h3>
                    <p style="font-size: 0.92rem; color: var(--dark-2); line-height: 1.7;">
                        Detak jantung dalam rentang 60–100 BPM saat istirahat dianggap normal untuk orang dewasa. Jantung memompa darah dengan efisien dan tubuh mendapatkan oksigen serta nutrisi yang cukup. Tetap jaga pola hidup sehat dengan olahraga teratur dan pola makan seimbang.
                    </p>
                </div>

                <div class="card edu-card" style="margin-bottom: 0;">
                    <h3 style="color: #991b1b;">🔴 Takikardia (BPM &gt; 100)</h3>
                    <p style="font-size: 0.92rem; color: var(--dark-2); line-height: 1.7;">
                        Takikardia adalah kondisi di mana detak jantung lebih cepat dari normal (di atas 100 BPM) saat istirahat. Bisa disebabkan oleh stres, kafein, demam, atau gangguan jantung. Jika berlangsung terus-menerus, perlu evaluasi medis lebih lanjut.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Faktor yang Mempengaruhi -->
    <div class="card">
        <div class="card-header">
            <h3>🔬 Faktor yang Mempengaruhi Detak Jantung</h3>
        </div>
        <div class="card-body">
            <div class="edu-grid">
                <div class="card edu-card" style="margin-bottom: 0;">
                    <h3>👤 Usia</h3>
                    <ul>
                        <li>🔹 Bayi dan anak-anak memiliki detak jantung lebih tinggi (100–160 BPM)</li>
                        <li>🔹 Remaja dan dewasa muda: 60–100 BPM</li>
                        <li>🔹 Lansia cenderung memiliki detak jantung yang lebih lambat</li>
                    </ul>
                </div>

                <div class="card edu-card" style="margin-bottom: 0;">
                    <h3>🏃 Aktivitas Fisik</h3>
                    <ul>
                        <li>🔹 Olahraga meningkatkan detak jantung secara sementara</li>
                        <li>🔹 Orang yang rutin berolahraga memiliki detak jantung istirahat yang lebih rendah</li>
                        <li>🔹 Atlet profesional bisa memiliki BPM istirahat 40–60</li>
                    </ul>
                </div>

                <div class="card edu-card" style="margin-bottom: 0;">
                    <h3>😰 Emosi dan Stres</h3>
                    <ul>
                        <li>🔹 Stres, kecemasan, dan ketakutan meningkatkan detak jantung</li>
                        <li>🔹 Relaksasi dan meditasi dapat menurunkan detak jantung</li>
                        <li>🔹 Emosi kuat dapat memicu aritmia pada orang sensitif</li>
                    </ul>
                </div>

                <div class="card edu-card" style="margin-bottom: 0;">
                    <h3>🏥 Kondisi Kesehatan</h3>
                    <ul>
                        <li>🔹 Demam meningkatkan detak jantung (~10 BPM per 1°C)</li>
                        <li>🔹 Anemia membuat jantung bekerja lebih keras</li>
                        <li>🔹 Gangguan tiroid mempengaruhi ritme jantung</li>
                        <li>🔹 Penyakit jantung dapat menyebabkan aritmia</li>
                    </ul>
                </div>

                <div class="card edu-card" style="margin-bottom: 0;">
                    <h3>☕ Konsumsi Kafein</h3>
                    <ul>
                        <li>🔹 Kopi, teh, dan minuman energi mengandung kafein</li>
                        <li>🔹 Kafein menstimulasi sistem saraf dan meningkatkan detak jantung</li>
                        <li>🔹 Konsumsi berlebihan dapat menyebabkan palpitasi</li>
                        <li>🔹 Batasi konsumsi kafein untuk menjaga kesehatan jantung</li>
                    </ul>
                </div>

                <div class="card edu-card" style="margin-bottom: 0;">
                    <h3>💊 Obat-obatan</h3>
                    <ul>
                        <li>🔹 Beberapa obat seperti beta-blocker menurunkan detak jantung</li>
                        <li>🔹 Dekongestan dan stimulan dapat meningkatkan BPM</li>
                        <li>🔹 Selalu informasikan dokter tentang obat yang dikonsumsi</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Disclaimer -->
    <div class="card">
        <div class="card-body">
            <div class="alert alert-warning" style="margin-bottom: 0;">
                <div>
                    <strong>⚠️ Disclaimer Penting</strong>
                    <p style="margin-top: 8px; font-size: 0.92rem;">
                        PulseClip adalah sistem monitoring detak jantung yang dikembangkan untuk tujuan <strong>edukasi dan pemantauan awal</strong>. Sistem ini <strong>BUKAN</strong> alat diagnosis medis dan tidak dapat menggantikan pemeriksaan oleh tenaga medis profesional. Jika Anda mengalami gejala atau keluhan terkait jantung, segera konsultasikan ke dokter atau fasilitas kesehatan terdekat.
                    </p>
                </div>
            </div>
        </div>
    </div>

</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
