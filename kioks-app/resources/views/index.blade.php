<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Selimcan Gürsu | Full Stack Web Developer">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.12.1/font/bootstrap-icons.min.css">
    <title>Kioks App</title>
</head>
<body>
    <style>
        .person-list {
            display: flex;
            flex-direction: column;
            gap: 20px;  
        }      
        .person-card {
            display: flex;
            background: transparent;
            border-radius: 7px;
            padding: 20px;
            transition: all 0.3s ease;
            border:1px solid gray;
            align-items: center;
        }    
        .card-left .avatar {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background-color: #C0392B;
            color: white;
            font-weight: bold;
            font-size: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
        } 
        .card-right {
            margin-left: 20px;
            flex: 1;
        }
        .card-right .name {
            margin: 0;
            font-size: 15px;
            color: #333;
            font-weight: 600;
        }
        .card-right p {
            margin: 6px 0;
            color: #555;
            font-size: 13px;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .left-panel{
          background: #C0392B  ;
          height: 100vh; 
        }
    </style>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 p-4 left-panel">
                <h5 class="text-white">Hoşgeldiniz!</h5>
                  <div class="home">
                       <button  id="salesButton" class="p-4 w-100 border-1 border-white text-white bg-transparent mt-3">
                        <i class="bi bi-bag-check d-block fs-3"></i>
                        Satış ve Satın Alma
                       </button>
                       <button id="serviceButton" class="p-4 w-100 border-1 border-white text-white bg-transparent mt-3">
                        <i class="bi bi-gear d-block fs-3"></i>
                        Teknik Servis
                       </button>
                       <button class="referanceButton p-4 w-100 border-1 border-white text-white bg-transparent mt-3">
                        <i class="bi bi-code d-block fs-3"></i>
                        Referans Kodu Giriş
                       </button>
                       <button id="paymentButton" class="p-4 w-100 border-1 border-white text-white bg-transparent mt-3">
                        <i class="bi bi-credit-card d-block fs-3"></i>
                        Hızlı Ödeme
                       </button>
                       <button id="serviceFormButton" class="p-4 w-100  border-1 border-white text-white bg-transparent mt-3">
                        <i class="bi bi-star d-block fs-3"></i>
                        Hizmet Değerlendirme
                       </button>
                   </div>
                   <div class="serviceMain" style="display: none">
                    <button class="homeBackButton p-4 w-100 border-1 border-white text-white bg-transparent mt-3">
                        <i class="bi bi-arrow-return-left d-block fs-3"></i>
                       Geri Dön
                       </button>
                       <button id="serviceSupportButton" data-bs-dismiss="modal" class="p-4 w-100 border-1 border-white text-white bg-transparent mt-3">
                        <i class="bi bi-gear fs-3 d-block "></i>
                       Destek Talebi
                       </button>
                       <button id="giveServiceProductButton" data-bs-dismiss="modal" class="p-4 w-100 border-1 border-white text-white bg-transparent mt-3">
                        <i class="bi bi-cloud-arrow-up d-block  fs-3"></i>
                       Cihaz Teslim Et
                       </button>
                       <button id="receiveServiceProductButton" data-bs-dismiss="modal" class="p-4 w-100 border-1 border-white text-white bg-transparent mt-3">
                        <i class="bi bi-cloud-arrow-down d-block  fs-3"></i>
                       Cihaz Teslim Al
                    </button>
                </div>
                <div class="salesMain" style="display: none">
                    <button class="homeBackButton p-4 w-100 border-1 border-white text-white bg-transparent mt-3">
                        <i class="bi bi-arrow-return-left d-block fs-3"></i>
                       Geri Dön
                       </button>
                       <button id="salesInfoButton" data-bs-dismiss="modal" class="p-4 w-100 border-1 border-white text-white bg-transparent mt-3">
                        <i class="bi bi-info-circle d-block fs-3"></i>
                        Bilgi Al
                       </button>
                       <button data-bs-dismiss="modal" class="referanceButton p-4 w-100 border-1 border-white text-white bg-transparent mt-3">
                        <i class="bi bi-code d-block fs-3"></i>
                         Referans Kodu Girin
                       </button>
                  </div>
                  <div class="paymentMain" style="display: none">
                      <button class="homeBackButton p-4 w-100 border-1 border-white text-white bg-transparent mt-3">
                        <i class="bi bi-arrow-return-left d-block fs-3"></i>
                       Geri Dön
                       </button>
                       <button id="openIbanInfo" data-bs-dismiss="modal" class="p-4 w-100 border-1 border-white text-white bg-transparent mt-3">
                        <i class="bi bi-info-circle d-block fs-3"></i>
                         İban Bilgilerimiz
                       </button>
                  </div>
              </div>
             <div class="col-md-6">
                <div class="carousel-images">
                    <div id="carouselExampleIndicators" class="carousel slide">
                        <div class="carousel-indicators">
                          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div>
                        <div style="height: 220px" class="carousel-inner">
                          <div class="carousel-item active">
                            <img src="https://img.freepik.com/free-photo/rehearsal-preparation-groom-s-watch-hand_8353-5810.jpg?ga=GA1.1.750660428.1742764870&semt=ais_hybrid&w=740" class="d-block w-100" alt="...">
                          </div>
                          <div class="carousel-item">
                            <img src="https://img.freepik.com/free-photo/closeup-shot-modern-cool-black-digital-watch-with-brown-leather-strap_181624-3545.jpg?ga=GA1.1.750660428.1742764870&semt=ais_hybrid&w=740" class="d-block w-100" alt="...">
                          </div>
                          <div class="carousel-item">
                            <img src="https://img.freepik.com/free-photo/human-hand-working-with-laptop-networking-technology_53876-42684.jpg?ga=GA1.1.750660428.1742764870&semt=ais_hybrid&w=740" class="d-block w-100" alt="...">
                          </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Next</span>
                        </button>
                      </div>
                </div>
                <div class="person-list p-2">
                    @foreach($active_data as $data)
                    <div class="person-card p-3 mt-1">
                        <div class="card-left">
                            <div class="avatar">A</div>
                        </div>
                        <div class="card-right ms-3">
                            <h5 class="name">Temsilci : {{$data->user_name}}</h5>             
                            <div class="d-flex justify-content-between">        
                            <p class="subject"><i class="fas fa-comment-dots"></i> {{$data->unit_name}} | {{$data->unitMainName}}</p>
                            <p class="datetime"><i class="fas fa-clock"></i> {{$data->created_at}}</p>
                        </div>       
                        </div>
                    </div>
                    @endforeach
                  </div>  
               </div> 
            </div>
          </div>
      </body>
      <script>
        $(document).ready(function () {
    
            // Sayfa Geçişleri
            $('#serviceButton').click(function (e) {
                e.preventDefault();
                $('.home').hide();
                $('.serviceMain').show();
            });
    
            $('.homeBackButton').click(function (e) {
                e.preventDefault();
                $('.home').show();
                $('.serviceMain, .salesMain, .paymentMain').hide();
            });
    
            $('#salesButton').click(function (e) {
                e.preventDefault();
                $('.home').hide();
                $('.salesMain').show();
            });
    
            $('#paymentButton').click(function (e) {
                e.preventDefault();
                $('.home').hide();
                $('.paymentMain').show();
            });
    
            // Referans Kodu
            $('.referanceButton').click(function (e) {
             e.preventDefault();

             Swal.fire({
              title: "Referans Kodunuzu Giriniz!",
              input: "number",
              inputAttributes: {
                autocapitalize: "off"
               },
               showCancelButton: false,
               confirmButtonText: "Tamam!",
               showLoaderOnConfirm: true,
               preConfirm: (referanceCode) => {
               return $.ajax({
                type: 'POST',
                url: "{{route('referanceCode')}}", 
                data: {
                    referanceCode: referanceCode,
                    _token: "{{ csrf_token() }}"
                },
                success: function (response) {
                                    if (response.success) {
                                        Swal.fire({
                                            icon: 'success',
                                            title: response.message,
                                            confirmButtonText: "Tamam",
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                window.location.reload();
                                            }
                                        });
                                    } else {
                                        Swal.fire({
                                            icon: "error",
                                            title: "Hata!",
                                            text: response.message
                                        });
                                    }
                                    resolve();
                 },

            });
        }
    });
});

    
            // İBAN Bilgileri
            $('#openIbanInfo').click(function (e) {
                e.preventDefault();
                Swal.fire({
                    icon: "warning",
                    title: "IBAN BİLGİLERİ",
                    html: `
                        <p><strong>IBAN:</strong> TR12 3456 7890 1234 5678 9012 3456</p>
                        <p><strong>Firma İsmi:</strong> Selimcan Gürsu</p>
                        <p><strong>Banka Şubesi:</strong> ABC Şubesi</p>
                        <p><strong>Banka:</strong> XYZ Bankası</p>
                    `,
                });
            });
    
            // Hizmet Değerlendirme
            $('#serviceFormButton').click(function (e) {
                e.preventDefault();
                Swal.fire({
                    icon: "question",
                    title: "Hizmeti nasıl değerlendirirsiniz?",
                    html: `
                        <div class="rating">
                            <i class="fa-solid fa-star fs-1" data-value="1"></i>
                            <i class="fa-solid fa-star fs-1" data-value="2"></i>
                            <i class="fa-solid fa-star fs-1" data-value="3"></i>
                            <i class="fa-solid fa-star fs-1" data-value="4"></i>
                            <i class="fa-solid fa-star fs-1" data-value="5"></i>
                        </div>
                    `,
                    showConfirmButton: false,
                    didOpen: () => {
                        const stars = Swal.getPopup().querySelectorAll('.fa-star');
                        stars.forEach(star => {
                            star.addEventListener('mouseover', function () {
                                const val = this.getAttribute('data-value');
                                stars.forEach(s => {
                                    s.style.color = s.getAttribute('data-value') <= val ? '#f5c518' : '#ccc';
                                });
                            });
    
                            star.addEventListener('click', function () {
                                const selected = this.getAttribute('data-value');
                                Swal.fire({
                                    icon: 'success',
                                    title: `Teşekkürler!`,
                                    text: `Puanınız: ${selected} yıldız`
                                });
                            });
                        });
                    }
                });
            });
    
            // Satış Bilgi Talebi
            $('#salesInfoButton').click(function (e) {
                e.preventDefault();
                requestPhoneInput("{{ route('salesInfo') }}");
            });
    
            // Teknik Servis Destek Talebi
            $('#serviceSupportButton').click(function (e) {
                e.preventDefault();
                requestPhoneInput("{{ route('serviceSupport') }}");
            });
    
            // Cihaz Teslim Etme Talebi
            $('#giveServiceProductButton').click(function (e) {
                e.preventDefault();
                requestPhoneInput("{{ route('giveServiceProduct') }}");
            });
    
            // Cihaz Teslim Alma Talebi
            $('#receiveServiceProductButton').click(function (e) {
                e.preventDefault();
                requestPhoneInput("{{ route('giveServiceProduct') }}");
            });
    
            // Ortak Telefon Numarası Giriş İsteği
            function requestPhoneInput(url) {
                Swal.fire({
                    icon: "warning",
                    title: "Telefon Numaranızı Giriniz!",
                    input: "tel",
                    inputAttributes: {
                        autocapitalize: "off",
                        placeholder: "05xxxxxxxxx"
                    },
                    confirmButtonText: "Talep Oluştur!",
                    showLoaderOnConfirm: true,
                    preConfirm: (phone) => {
                        return new Promise((resolve, reject) => {
                            if (!phone) {
                                reject("Telefon numarası boş olamaz!");
                                return;
                            }
    
                            $.ajax({
                                url: url,
                                type: "POST",
                                data: {
                                    phone: phone,
                                    _token: "{{ csrf_token() }}"
                                },
                                success: function (response) {
                                    if (response.success) {
                                        Swal.fire({
                                            icon: 'success',
                                            title: response.message,
                                            confirmButtonText: "Tamam",
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                window.location.reload();
                                            }
                                        });
                                    } else {
                                        Swal.fire({
                                            icon: "error",
                                            title: "Hata!",
                                            text: response.message
                                        });
                                    }
                                    resolve();
                                },
                                error: function () {
                                    Swal.fire({
                                        icon: "error",
                                        title: "İstek Hatası",
                                        text: "Telefon numarası gönderilirken bir hata oluştu."
                                    });
                                    reject();
                                }
                            });
                        });
                    },
                    allowOutsideClick: () => !Swal.isLoading()
                });
            }
        });
    </script>    
</html>
