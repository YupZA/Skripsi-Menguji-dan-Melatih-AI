function showExplain(type) {
    const box = document.getElementById('aiExplainBox');

    if (type === 'program') {
        box.innerHTML = `
            <h4>📄 Program Biasa</h4>
            <p>
                Program biasa bekerja berdasarkan <strong>aturan tetap</strong>.
                Jika tidak dituliskan oleh manusia, maka komputer
                <em>tidak akan tahu harus berbuat apa</em>.
            </p>
            <p>
                Contoh: kalkulator, program kasir sederhana, atau lampu otomatis
                dengan timer.
            </p>
        `;
        box.className = 'ai-explain program';
    } else {
        box.innerHTML = `
            <h4>🧠 Kecerdasan Buatan</h4>
            <p>
                Kecerdasan buatan mampu <strong>belajar dari data</strong>,
                menemukan pola, dan memperbaiki hasilnya
                <em>tanpa harus diatur satu per satu</em>.
            </p>
            <p>
                Contoh: pengenal wajah, rekomendasi YouTube, dan asisten suara.
            </p>
        `;
        box.className = 'ai-explain ai';
    }
}
