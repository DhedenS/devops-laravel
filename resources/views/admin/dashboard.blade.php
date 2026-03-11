@extends('layouts/admin.admin')


@push('styles')
    <style>
        .click-here {
            opacity: 0;
        }

        .card > * {
            user-select: none;
            /* Standard syntax */
            -webkit-user-select: none;
            /* Safari/Chrome */
            -moz-user-select: none;
            /* Firefox */
            -ms-user-select: none;
            /* IE/Edge */
        }
    </style>
@endpush

@section('content')
    <div class="container-fluid mt-0 p-3">
        <h2 class="fw-bold"><i class="bi bi-speedometer2"></i> Dashboard</h2>
        <p class="text-muted">Ringkasan aktivitas pasca panen padi</p>

        <!-- Top Summary Cards -->
        <div class="row g-3">
            <!-- Farmer Stats -->
            <div class="col-12 col-sm-6 col-md-3">
                <a href="{{route('petani.index')}}" style="text-decoration:none">
                    <div class="card shadow-sm p-3 text-center border-0 bg-success text-white position-relative" id="cardSummary">
                    <p class="position-absolute top-0 end-0 m-3 click-here">
                        <i class="bi bi-hand-index-fill"></i>
                    </p>
                    <div>
                        <i class="bi bi-people fs-2 mb-2"></i>
                        <h5>Total Petani</h5>
                        <p class="fs-3 fw-bold"><span>42</span></p>
                        <span class="fs-6">⬆ 12% dari bulan lalu</span>
                    </div>


                </div>
                </a>

            </div>

            <!-- Production Overview -->
            <div class="col-12 col-sm-6 col-md-3">
                <a href="{{route('padi.index')}}" style="text-decoration: none">
                <div class="card shadow-sm p-3 text-center border-0 bg-success text-white" id="cardSummary">
                    <p class="position-absolute top-0 end-0 m-3 click-here">
                        <i class="bi bi-hand-index-fill"></i>
                    </p>

                    <div>
                        <i class="bi bi-box-seam fs-2 mb-2"></i>
                        <h5>Produksi Padi</h5>
                        <p class="fs-3 fw-bold"><span>1,850</span> kg</p>
                        <span class="fs-6">⬆ 8% dari bulan lalu</span>
                    </div>
                </div>
                </a>

            </div>

            <!-- Inventory Alerts -->
            <div class="col-12 col-sm-6 col-md-3">
                 <a href="{{route('produk.index')}}" style="text-decoration:none">
                <div class="card shadow-sm p-3 text-center border-0 bg-success text-white" id="cardSummary">
                    <p class="position-absolute top-0 end-0 m-3 click-here">
                        <i class="bi bi-hand-index-fill"></i>
                    </p>

                    <div>
                        <i class="bi bi-exclamation-triangle fs-2 mb-2"></i>
                        <h5>Stok Rendah</h5>
                        <p class="fs-3 fw-bold"><span>3</span> Produk</p>
                        <span class="fs-6">Perlu restock</span>
                    </div>

                </div>
                 </a>
            </div>

            <!-- Financial Summary -->
            <div class="col-12 col-sm-6 col-md-3">
                <a href="" style="text-decoration: none">
                <div class="card shadow-sm p-3 text-center border-0 bg-success text-white" id="cardSummary">
                    <p class="position-absolute top-0 end-0 m-3 click-here">
                        <i class="bi bi-hand-index-fill"></i>
                    </p>
                    <div>
                        <i class="bi bi-cash-coin fs-2 mb-2"></i>
                        <h5>Pendapatan</h5>
                        <p class="fs-3 fw-bold">Rp <span>24,5jt</span></p>
                        <span class="fs-6">⬆ 15% dari bulan lalu</span>
                    </div>
                </div>
            </div>
            </a>
        </div>

        <!-- Main Dashboard Sections -->
        <div class="row mt-4 g-3">
            <!-- Left Column -->
            <div class="col-12 col-lg-8">
                <!-- Production Trend -->
                <div class="card shadow-sm p-3 mb-3">
                    <h5 class="fw-bold"><i class="bi bi-graph-up"></i> Tren Produksi 6 Bulan Terakhir</h5>
                    <div id="productionTrendChart"></div>
                </div>

                <!-- Recent Transactions -->
                <div class="card shadow-sm p-3">
                    <h5 class="fw-bold"><i class="bi bi-clock-history"></i> Transaksi Terakhir</h5>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Petani</th>
                                    <th>Jenis</th>
                                    <th>Jumlah</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>15 Jun 2023</td>
                                    <td>Budi Santoso</td>
                                    <td>Penjualan Padi</td>
                                    <td>150 kg</td>
                                    <td>Rp 750.000</td>
                                </tr>
                                <tr>
                                    <td>14 Jun 2023</td>
                                    <td>Siti Rahayu</td>
                                    <td>Penyewaan Alat</td>
                                    <td>2 hari</td>
                                    <td>Rp 200.000</td>
                                </tr>
                                <tr>
                                    <td>12 Jun 2023</td>
                                    <td>Agus Wijaya</td>
                                    <td>Penjualan Beras</td>
                                    <td>50 kg</td>
                                    <td>Rp 500.000</td>
                                </tr>
                                <tr>
                                    <td>10 Jun 2023</td>
                                    <td>Dewi Kurnia</td>
                                    <td>Pembelian Pupuk</td>
                                    <td>5 kg</td>
                                    <td>Rp 150.000</td>
                                </tr>
                                <tr>
                                    <td>08 Jun 2023</td>
                                    <td>Rudi Hartono</td>
                                    <td>Penjualan Padi</td>
                                    <td>200 kg</td>
                                    <td>Rp 1.000.000</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Right Column -->
            <div class="col-12 col-lg-4">
                <!-- Gender Distribution -->
                <div class="card shadow-sm p-3 mb-3">
                    <h5 class="fw-bold"><i class="bi bi-gender-ambiguous"></i> Gender Petani</h5>
                    <div id="genderChart"></div>
                </div>

                <!-- Inventory Alerts -->
                <div class="card shadow-sm p-3 mb-3">
                    <h5 class="fw-bold"><i class="bi bi-exclamation-triangle text-warning"></i> Stok Rendah</h5>
                    <div class="list-group">
                        <div class="list-group-item d-flex justify-content-between align-items-center">
                            Pupuk Organik
                            <span class="badge bg-danger rounded-pill">2 kg</span>
                        </div>
                        <div class="list-group-item d-flex justify-content-between align-items-center">
                            Pestisida
                            <span class="badge bg-warning rounded-pill">3 botol</span>
                        </div>
                        <div class="list-group-item d-flex justify-content-between align-items-center">
                            Karung Beras
                            <span class="badge bg-warning rounded-pill">10 pcs</span>
                        </div>
                    </div>
                </div>

                <!-- Pending Approvals -->
                <div class="card shadow-sm p-3">
                    <h5 class="fw-bold"><i class="bi bi-hourglass-split text-primary"></i> Persetujuan Menunggu</h5>
                    <div class="list-group">
                        <div class="list-group-item">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-1">Pengajuan Sewa Traktor</h6>
                                <small>2 hari lalu</small>
                            </div>
                            <p class="mb-1">Oleh: Ahmad Fauzi</p>
                            <small class="text-muted">3 hari, Rp 450.000</small>
                        </div>
                        <div class="list-group-item">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-1">Pengajuan Pupuk</h6>
                                <small>1 hari lalu</small>
                            </div>
                            <p class="mb-1">Oleh: Sri Lestari</p>
                            <small class="text-muted">10 kg</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://cdn.jsdelivr.net/npm/animejs/lib/anime.iife.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Production Trend Chart
            var productionOptions = {
                series: [{
                    name: 'Padi',
                    data: [1200, 1500, 1800, 1650, 2100, 1850]
                }, {
                    name: 'Beras',
                    data: [950, 1200, 1500, 1300, 1800, 1550]
                }],
                chart: {
                    type: 'line',
                    height: 300,
                    toolbar: {
                        show: true
                    }
                },
                colors: ['#28a745', '#ffc107'],
                stroke: {
                    curve: 'smooth',
                    width: 3
                },
                xaxis: {
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'],
                    labels: {
                        style: {
                            colors: '#6c757d'
                        }
                    }
                },
                yaxis: {
                    title: {
                        text: 'Jumlah (kg)',
                        style: {
                            color: '#6c757d'
                        }
                    },
                    labels: {
                        style: {
                            colors: '#6c757d'
                        }
                    }
                },
                legend: {
                    position: 'top'
                },
                tooltip: {
                    y: {
                        formatter: (val) => val + ' kg'
                    }
                }
            };
            var productionChart = new ApexCharts(document.querySelector("#productionTrendChart"),
                productionOptions);
            productionChart.render();

            // Gender Distribution Chart
            var genderOptions = {
                series: [28, 14],
                chart: {
                    type: 'donut',
                    height: 300
                },
                labels: ['Laki-laki', 'Perempuan'],
                colors: ['#0d6efd', '#ff6b6b'],
                legend: {
                    position: 'bottom'
                },
                plotOptions: {
                    pie: {
                        donut: {
                            labels: {
                                show: true,
                                total: {
                                    show: true,
                                    label: 'Total Petani',
                                    formatter: () => '42'
                                }
                            }
                        }
                    }
                },
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            width: 200
                        },
                        legend: {
                            position: 'bottom'
                        }
                    }
                }]
            };
            var genderChart = new ApexCharts(document.querySelector("#genderChart"), genderOptions);
            genderChart.render();
        });
    </script>
@endpush

@push('animations')
    <script>
        function percentageDiff(currentValue, lastValue) {
            const diff = currentValue - lastValue;
            return (diff / lastValue) * 100;
        }
        const {
            animate,
            utils
        } = anime;

        const $cardNumber = utils.$("#cardSummary p span");
        const $card = utils.$('#cardSummary');
        const $clickHereText = utils.$('click-here');


        let increment = 0;
        const petani = @json($petani);
        const penjualan = @json($penjualan);
        const produksiBeras = @json($produksiBeras);
        const pendapatan = @json($pendapatan);

        console.log(pendapatan['CurrentMonth']);

        const cardNumberValue = [petani.Total, produksiBeras.Total, 0, pendapatan.Total]

        animate('#cardSummary', {
            y: [{
                    to: '-2.75rem',
                    ease: 'outExpo',
                    duration: 400
                },
                {
                    to: 0,
                    ease: 'outBounce',
                    duration: 400,
                    delay: 200
                }
            ],
            delay: (_, i) => i * 50,

        });

        $card.forEach(element => {
            const $click = element.querySelector('.click-here')

            element.addEventListener('mouseenter', () => {
                animate(element, {
                    y: '-1rem',
                    ease: 'outExpo',
                    duration: 400,
                    cursor: 'pointer',
                    onBegin: () => {
                        animate($click, {
                            opacity: 1,
                            duration: 100
                        })
                    }
                });


            });

            element.addEventListener('mouseleave', () => {
                animate(element, {
                    y: '0',
                    ease: 'outExpo',
                    duration: 400,
                    onBegin: () => {
                        animate($click, {
                            opacity: 0,
                            duration: 100
                        })
                    }
                });
            })

        });
        $cardNumber.forEach(element => {
            element.innerHTML = 0;
            const obj = {
                value: 0
            }


            animate(obj, {
                value: cardNumberValue[increment],
                ease: 'linear',
                duration: 1000,
                modifier: self => Math.round(self).toLocaleString("id-ID"),
                onRender: self => element.innerHTML = obj.value
            })
            increment++;

        });
    </script>
@endpush
