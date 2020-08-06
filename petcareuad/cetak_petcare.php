<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="icon" type="image/x-icon" href="img/pet1.ico" />
    <title>Pesan Petcare</title>
    
    <style>
    .invoice-box {
        max-width: 800px;
        margin: auto;
        padding: 30px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, .15);
        font-size: 16px;
        line-height: 24px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
    }
    
    .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
    }
    
    .invoice-box table td {
        padding: 5px;
        vertical-align: top;
    }
    
    .invoice-box table tr td:nth-child(2) {
        text-align: left;
    }
    
    .invoice-box table tr.top table td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
    }
    
    .invoice-box table tr.information table td {
        padding-bottom: 40px;
    }
    
    .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
    }
    
    .invoice-box table tr.details td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.item td{
        border-bottom: 1px solid #eee;
    }
    
    .invoice-box table tr.item.last td {
        border-bottom: none;
    }
    
    .invoice-box table tr.total td:nth-child(2) {
        border-top: 2px solid #eee;
        font-weight: bold;
    }
    
    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }
        
        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
        }
    }
    
    /** RTL **/
    .rtl {
        direction: rtl;
        font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    }
    
    .rtl table {
        text-align: right;
    }
    
    .rtl table tr td:nth-child(2) {
        text-align: left;
    }
    </style>
</head>

<body onload="window.print()">


    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="5">
                    <table>
                        <tr>
                            <td class="title">
                                <p style="font-size: 20px;">PETCAREUAD
                            </td>
                            
                            
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="information">
                <td colspan="10">
                    <table>
                        <tr>                    
                            <td>PETCAREUAD<br></td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="details">
                <td></td>
                <td></td>
            </tr>
            
            <tr class="heading">
                <td>Nama Hewan</td>
                <td>Usia</td>
                <td>Keluhan</td>
                <td>Fasilitas</td>
                <td>Jenis Kelamin</td>
            </tr>

                    <?php 
                    include 'koneksi.php';
                    $no = 1;
                    $data = mysqli_query($koneksi,"select * from tb_reservasi");
                    while($d = mysqli_fetch_array($data)){
                        ?>
                        <tbody>
                        <tr class="item">
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $d['nama_hewan']; ?></td>
                            <td><?php echo $d['usia']; ?></td>
                            <td><?php echo $d['keluhan']; ?></td>
                            <td><?php echo $d['fasilitas']; ?></td>
                            <td><?php echo $d['jk']; ?></td> 
                        </tr>
                        </tbody>
            <?php } ?>
        </table>
    </div>
</body>
</html>