<?php
    if(isset($_POST["bayar_kasbon"])){
        $tekstotalkasbon = $_POST["totalkasbon"];
        $teksbayarkasbon = $_POST["bayar_kasbon"];

        $format_totalkasbon = explode(".", $_POST["totalkasbon"]); 
        $format_bayarkasbon = explode(".", $_POST["bayar_kasbon"]);
        $format_total_upah = explode(".", $_POST["total_upah"]);

        $totalkasbon = implode($format_totalkasbon);
        $bayar_kasbon = implode($format_bayarkasbon);
        $total_upah = implode($format_total_upah);

        $sisakasbon = $totalkasbon - $bayar_kasbon;
        $sisaupah = $total_upah - $bayar_kasbon;

        if($tekstotalkasbon == 0){
            if($teksbayarkasbon != 0){
                $dataalert = array(
                    "totalkasbon" => $totalkasbon,
                    "bayarkasbon" => $bayar_kasbon,
                    "alertkasbon" => "Isi angka 0 jika tidak ada kasbon!",
                );

                echo json_encode($dataalert);
            }else{
                $dataalert = array(
                    "sisa_kasbon" => number_format($sisakasbon,0,",","."),
                    "sisa_upah" => number_format($sisaupah,0,",",".")
                );

                echo json_encode($dataalert);
            }
        }elseif($tekstotalkasbon != 0){
            

            $data_upah = array(
                "totalkasbon" => $totalkasbon,
                "bayarkasbon" => $bayar_kasbon,
                "sisa_kasbon" => number_format($sisakasbon,0,",","."),
                "sisa_upah" => number_format($sisaupah,0,",",".")
            );

            echo json_encode($data_upah);
        }
    }
?>