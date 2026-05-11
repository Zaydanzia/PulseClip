/**
 * PulseClip - Chart Configuration
 * Konfigurasi Chart.js untuk grafik BPM
 */

function initBPMChart(labels, data) {
    const ctx = document.getElementById('bpmChart');
    if (!ctx) return;

    // Gradient fill
    const chartCtx = ctx.getContext('2d');
    const gradient = chartCtx.createLinearGradient(0, 0, 0, 320);
    gradient.addColorStop(0, 'rgba(8, 145, 178, 0.25)');
    gradient.addColorStop(1, 'rgba(8, 145, 178, 0.02)');

    // Point colors based on BPM value
    const pointColors = data.map(bpm => {
        if (bpm < 60) return '#f59e0b';
        if (bpm > 100) return '#ef4444';
        return '#10b981';
    });

    const pointBorderColors = data.map(bpm => {
        if (bpm < 60) return '#d97706';
        if (bpm > 100) return '#dc2626';
        return '#059669';
    });

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'BPM',
                data: data,
                borderColor: '#0891b2',
                backgroundColor: gradient,
                borderWidth: 2.5,
                pointBackgroundColor: pointColors,
                pointBorderColor: pointBorderColors,
                pointBorderWidth: 2,
                pointRadius: 5,
                pointHoverRadius: 8,
                fill: true,
                tension: 0.4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            interaction: {
                intersect: false,
                mode: 'index'
            },
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    backgroundColor: '#1e293b',
                    titleFont: { family: 'Inter', size: 13, weight: '600' },
                    bodyFont: { family: 'Inter', size: 12 },
                    padding: 12,
                    cornerRadius: 8,
                    displayColors: false,
                    callbacks: {
                        title: function(items) {
                            return 'Waktu: ' + items[0].label;
                        },
                        label: function(context) {
                            const bpm = context.parsed.y;
                            let status = 'Normal';
                            if (bpm < 60) status = 'Rendah';
                            else if (bpm > 100) status = 'Tinggi';
                            return ['BPM: ' + bpm, 'Status: ' + status];
                        }
                    }
                }
            },
            scales: {
                x: {
                    grid: {
                        display: false
                    },
                    ticks: {
                        font: { family: 'Inter', size: 11 },
                        color: '#94a3b8',
                        maxRotation: 45
                    }
                },
                y: {
                    min: 30,
                    max: 180,
                    grid: {
                        color: 'rgba(0,0,0,0.04)'
                    },
                    ticks: {
                        font: { family: 'Inter', size: 11 },
                        color: '#94a3b8',
                        stepSize: 20
                    }
                }
            }
        }
    });
}
