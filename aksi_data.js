$(document).ready(function(){
  $("#tglawalfilterorder").datepicker({
    changeMonth: true,
    changeYear: true,
    yearRange: "-100:+0",
  });
  $("#tglakhirfilterorder").datepicker({
    changeMonth: true,
    changeYear: true,
    yearRange: "-100:+0",
  });

  $("#tglawalfilterbayartunai").datepicker({
    changeMonth: true,
    changeYear: true,
    yearRange: "-100:+0",
  });
  $("#tglakhirfilterbayartunai").datepicker({
    changeMonth: true,
    changeYear: true,
    yearRange: "-100:+0",
  });

  $("#tglawalfilterbayartempo").datepicker({
    changeMonth: true,
    changeYear: true,
    yearRange: "-100:+0",
  });
  $("#tglakhirfilterbayartempo").datepicker({
    changeMonth: true,
    changeYear: true,
    yearRange: "-100:+0",
  });

  $("#tglawalfilterpengeluaranlain").datepicker({
    changeMonth: true,
    changeYear: true,
    yearRange: "-100:+0",
  });
  $("#tglakhirfilterpengeluaranlain").datepicker({
    changeMonth: true,
    changeYear: true,
    yearRange: "-100:+0",
  });

  $("#tglawalfilterpengeluaranharian").datepicker({
    changeMonth: true,
    changeYear: true,
    yearRange: "-100:+0",
  });
  $("#tglakhirfilterpengeluaranharian").datepicker({
    changeMonth: true,
    changeYear: true,
    yearRange: "-100:+0",
  });

  $("#tglawalfilterbelanjabahanbaku").datepicker({
    changeMonth: true,
    changeYear: true,
    yearRange: "-100:+0",
  });
  $("#tglakhirfilterbelanjabahanbaku").datepicker({
    changeMonth: true,
    changeYear: true,
    yearRange: "-100:+0",
  });

  $("#tglawalfilterbelanjabahanbakulunas").datepicker({
    changeMonth: true,
    changeYear: true,
    yearRange: "-100:+0",
  });
  $("#tglakhirfilterbelanjabahanbakulunas").datepicker({
    changeMonth: true,
    changeYear: true,
    yearRange: "-100:+0",
  });

  $("#tglawalfilterrekkoran").datepicker({
    changeMonth: true,
    changeYear: true,
    yearRange: "-100:+0",
  });
  $("#tglakhirfilterrekkoran").datepicker({
    changeMonth: true,
    changeYear: true,
    yearRange: "-100:+0",
  });

  $("#tglhistoriproduksiawal").datepicker({
    changeMonth: true,
    changeYear: true,
    yearRange: "-100:+0",
  });
  $("#tglhistoriproduksiakhir").datepicker({
    changeMonth: true,
    changeYear: true,
    yearRange: "-100:+0",
  });

  $("#genteng").hide();
  $("#paving").hide();
  $("#lainlain").hide();

  $("#jenisbarang").change(function(){
    var jenisbarang = $(this).val();

    if(jenisbarang == "Genteng"){
      $("#genteng").show();
      $("#paving").hide();
      $("#lainlain").hide();
    }else if(jenisbarang == "Paving"){
      $("#genteng").hide();
      $("#paving").show();
      $("#lainlain").hide();
    }else if(jenisbarang == "Lain-lain"){
      $("#genteng").hide();
      $("#paving").hide();
      $("#lainlain").show();
    }
  });

  // untuk input pengaturan GENTENG

  $("#simpangenteng").click(function(){
    var kodebrggenteng = $("#kodebrggenteng").val();
    var namagenteng = $("#namagenteng").val();
    var limit_stockgenteng = $("#limit_stockgenteng").val();
    var rangecetakgenteng = $("#rangecetakgenteng").val();
    var tolcetakgenteng = $("#tolcetakgenteng").val();
    var gajicetakgenteng = $("#gajicetakgenteng").val();
    var rangecatgenteng = $("#rangecatgenteng").val();
    var tolcatgenteng = $("#tolcatgenteng").val();
    var gajicatgenteng = $("#gajicatgenteng").val();
    var rangeangkatgenteng = $("#rangeangkatgenteng").val();
    var tolangkatgenteng = $("#tolangkatgenteng").val();
    var gajiangkatgenteng = $("#gajiangkatgenteng").val();

    $.ajax({
      url : "proses_input_settinggenteng.php",
      type : "POST",
      data: {
        "kodebrggenteng":kodebrggenteng,
        "namagenteng":namagenteng,
        "limit_stockgenteng":limit_stockgenteng,
        "rangecetakgenteng":rangecetakgenteng,
        "tolcetakgenteng":tolcetakgenteng,
        "gajicetakgenteng":gajicetakgenteng,
        "rangecatgenteng":rangecatgenteng,
        "tolcatgenteng":tolcatgenteng,
        "gajicatgenteng":gajicatgenteng,
        "rangeangkatgenteng":rangeangkatgenteng,
        "tolangkatgenteng":tolangkatgenteng,
        "gajiangkatgenteng":gajiangkatgenteng
      },
      success : function(data){
        $("#laporaninputsetting").html(data);
      }
    });
  });

  // untuk input pengaturan PAVING
  $("#simpanpaving").click(function(){
    var kodebrgpaving = $("#kodebrgpaving").val();
    var namapaving = $("#namapaving").val();
    var limit_stockpaving = $("#limit_stockpaving").val();
    var qtymeterpaving = $("#qtymeterpaving").val();
    var rangecetakpaving = $("#rangecetakpaving").val();
    var tolcetakpaving = $("#tolcetakpaving").val();
    var gajicetakpaving = $("#gajicetakpaving").val();

    $.ajax({
      url : "proses_input_setting_paving.php",
      type : "POST",
      data : {"kodebrgpaving":kodebrgpaving,"namapaving":namapaving, "limit_stockpaving":limit_stockpaving, "qtymeterpaving":qtymeterpaving, "rangecetakpaving":rangecetakpaving, "tolcetakpaving":tolcetakpaving, "gajicetakpaving":gajicetakpaving},
      success : function(data){
        $("#laporaninputsetting").html(data);
      }
    });
  });

  // untuk barang lain lain
  $("#simpanlain").click(function(){
    var kodebrglain = $("#kodebrglain").val();
    var namabaranglain = $("#namabaranglain").val();
    var limit_stocklain = $("#limit_stocklain").val();
    var rangecetaklain = $("#rangecetaklain").val();
    var tolcetaklain = $("#tolcetaklain").val();
    var gajicetaklain = $("#gajicetaklain").val();

    $.ajax({
      url : "proses_input_setting_lain.php",
      type : "POST",
      data : {"kodebrglain":kodebrglain,"namabaranglain":namabaranglain, "limit_stocklain":limit_stocklain, "rangecetaklain":rangecetaklain, "tolcetaklain":tolcetaklain, "gajicetaklain":gajicetaklain},
      success : function(data){
        $("#laporaninputsetting").html(data);
      }
    });
  });

  // start filter order Pembeli
  $("#tglakhirfilterorder").on("change", function(){
    var tanggalAwal = $("#tglawalfilterorder").val();
    var tanggalAkhir = $(this).val();

    $.ajax({
      url : "proses_filter_orderpembeli.php",
      type : "POST",
      data : {"tanggalAwal":tanggalAwal, "tanggalAkhir":tanggalAkhir},
      success : function(data){
        $("#datafilterorder").html(data);
      }
    });
  });

  // start filter pembayar Tunai
  $("#tglakhirfilterbayartunai").on("change", function(){
    var tanggalAwal = $("#tglawalfilterbayartunai").val();
    var tanggalAkhir = $(this).val();

    $.ajax({
      url : "proses_filter_pembayartunai.php",
      type : "POST",
      data : {"tanggalAwal":tanggalAwal, "tanggalAkhir":tanggalAkhir},
      success : function(data){
        $("#datafilterbayartunai").html(data);
      }
    });
  });

  // start filter pembayar Tempo
  $("#tglakhirfilterbayartempo").on("change", function(){
    var tanggalAwal = $("#tglawalfilterbayartempo").val();
    var tanggalAkhir = $(this).val();

    $.ajax({
      url : "proses_filter_pembayartempo.php",
      type : "POST",
      data : {"tanggalAwal":tanggalAwal, "tanggalAkhir":tanggalAkhir},
      success : function(data){
        $("#datafilterbayartempo").html(data);
      }
    });
  });

  // filter pengeluaran Lain
  $("#tglakhirfilterpengeluaranlain").on("change", function(){
    var tanggalAwal = $("#tglawalfilterpengeluaranlain").val();
    var tanggalAkhir = $(this).val();

    $.ajax({
      url : "proses_filter_pengeluaranlain.php",
      type : "POST",
      data : {"tanggalAwal":tanggalAwal, "tanggalAkhir":tanggalAkhir},
      success : function(data){
        $("#datafilterpengeluaranlain").html(data);
      }
    });
  });

  // filter pengeluaran Harian
  $("#tglakhirfilterpengeluaranharian").on("change", function(){
    var tanggalAwal = $("#tglawalfilterpengeluaranharian").val();
    var tanggalAkhir = $(this).val();

    $.ajax({
      url : "proses_filter_pengeluaranharian.php",
      type : "POST",
      data : {"tanggalAwal":tanggalAwal, "tanggalAkhir":tanggalAkhir},
      success : function(data){
        $("#datafilterpengeluaranharian").html(data);
      }
    });
  });

  // filter belanja bahan baku
  $("#tglakhirfilterbelanjabahanbaku").on("change", function(){
    var tanggalAwal = $("#tglawalfilterbelanjabahanbaku").val();
    var tanggalAkhir = $(this).val();

    $.ajax({
      url : "proses_filter_bljbahanbaku.php",
      type : "POST",
      data : {"tanggalAwal":tanggalAwal, "tanggalAkhir":tanggalAkhir},
      success : function(data){
        $("#datafilterbljbahanbaku").html(data);
      }
    });
  });

  // filter belanja bahan baku lunas
  $("#tglakhirfilterbelanjabahanbakulunas").on("change", function(){
    var tanggalAwal = $("#tglawalfilterbelanjabahanbakulunas").val();
    var tanggalAkhir = $(this).val();

    $.ajax({
      url : "proses_filter_bljbahanbakulunas.php",
      type : "POST",
      data : {"tanggalAwal":tanggalAwal, "tanggalAkhir":tanggalAkhir},
      success : function(data){
        $("#datafilterbljbahanbakulunas").html(data);
      }
    });
  });

  // filter rek koran
  $("#tglakhirfilterrekkoran").on("change", function(){
    var tanggalAwal = $("#tglawalfilterrekkoran").val();
    var tanggalAkhir = $(this).val();

    $.ajax({
      url : "proses_filter_rekkoran.php",
      type : "POST",
      data : {"tanggalAwal":tanggalAwal, "tanggalAkhir":tanggalAkhir},
      success : function(data){
        $("#datafilterrekkoran").html(data);
      }
    });
  });
});

$("#btnfilterhistori").click(function(){
  var idkryhistori = $("#id_kryhistori").val();
  var tglawal = $("#tglhistoriproduksiawal").val();
  var tglakhir = $("#tglhistoriproduksiakhir").val();

  $.ajax({
    url : "proses_filter_produksikry.php",
    type : "POST",
    data : {"idkryhistori":idkryhistori, "tglawal":tglawal, "tglakhir":tglakhir},
    success : function(data){
      $("#filterproduksikry").html(data);
    }
  });
});

function format_angka(val){
  separator = ".";
  a = val.value;
  b = a.replace(/[^\d]/g,"");
  c = "";

  panjang = b.length;
  j = 0;

  for(i = panjang; i > 0; i --){
    j = j + 1;
    if((j % 3) == 1 && (j != 1)){
      c = b.substr(i-1,1) + separator + c;
    }else{
      c = b.substr(i-1,1) + c;
    }

    val.value = c;
  }
}
