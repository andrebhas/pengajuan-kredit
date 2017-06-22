$(document).ready(function() {

        //slide gambar
        $('.carousel').carousel()
        
        //modal delete
        $('a[data-confirm]').click(function(ev) {
		var href = $(this).attr('href');
		if (!$('#dataConfirmModal').length) {
			$('body').append('<div id="dataConfirmModal" class="modal fade" role="dialog" aria-labelledby="dataConfirmLabel" aria-hidden="true"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><h3 id="dataConfirmLabel">Confirm Delete</h3></div><div class="modal-body"></div><div class="modal-footer"><button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button><a class="btn btn-danger" id="dataConfirmOK">Delete</a></div></div>');
		} 
		$('#dataConfirmModal').find('.modal-body').text($(this).attr('data-confirm'));
		$('#dataConfirmOK').attr('href', href);
		$('#dataConfirmModal').modal({show:true});
		return false;
        });
        
        //pengaturan datepick
        $(function(){
           var startDate = new Date();
           window.prettyPrint && prettyPrint();
           $('#awal').datepicker({
            startDate: 'd',
            endDate: '+3m',
            autoclose: true 
            }).on('changeDate', function(selected){
                startDate = new Date(selected.date.valueOf());
                $('#akhir').datepicker('setStartDate', startDate);
                $('#akhir').datepicker('setDate', startDate);
            });
            
          $('#akhir').datepicker({
                startDate: startDate,
                endDate: '+6m',
                autoclose: true
            }).on('changeDate', function(selected){
                FromEndDate = new Date(selected.date.valueOf());
                $('#awal').datepicker('setEndDate', FromEndDate);
            });
          });
          
          //pengaturan slide
          $('#contain').animate({width:"100%"}, 1000);
          $('#contain2').fadeIn("slow");
          $('#contain3').fadeIn("slow");
          
});


    //combobox
    function myFunction()
    {
    var node = document.getElementById("tipe");
    window.location.href = node.options[node.selectedIndex].value;
    }
    
    //combo bobot
    function gantiNilai(baris, kolom, jumlahBaris)
    {
    
    var barisAkhir = jumlahBaris + 1;
    
    var nilai1 = 0.111;
    var nilai2 = 0.125;
    var nilai3 = 0.143;
    var nilai4 = 0.166;
    var nilai5 = 0.2;
    var nilai6 = 0.25;
    var nilai7 = 0.333;
    var nilai8 = 0.5;
    var nilai9 = 1;
            
    var node = document.getElementById("nilai"+baris+kolom);
    if(node.options[node.selectedIndex].value == '0.111'){
        
        hitung(baris, kolom, jumlahBaris, barisAkhir, nilai1, 9);
        
    } else if(node.options[node.selectedIndex].value == '0.125'){
        
        hitung(baris, kolom, jumlahBaris, barisAkhir, nilai2, 8);
        
    } else if(node.options[node.selectedIndex].value == '0.142'){
        
        hitung(baris, kolom, jumlahBaris, barisAkhir, nilai3, 7);
        
    } else if(node.options[node.selectedIndex].value == '0.166'){
        
        hitung(baris, kolom, jumlahBaris, barisAkhir, nilai4, 6);
        
    } else if(node.options[node.selectedIndex].value == '0.2'){
        
        hitung(baris, kolom, jumlahBaris, barisAkhir, nilai5, 5);
        
    } else if(node.options[node.selectedIndex].value == '0.25'){
        
        hitung(baris, kolom, jumlahBaris, barisAkhir, nilai6, 4);
        
    } else if(node.options[node.selectedIndex].value == '0.333'){
        
        hitung(baris, kolom, jumlahBaris, barisAkhir, nilai7, 3);
        
    } else if(node.options[node.selectedIndex].value == '0.5'){
        
        hitung(baris, kolom, jumlahBaris, barisAkhir, nilai8, 2);
        
    } else if(node.options[node.selectedIndex].value == '1'){
        
        hitung(baris, kolom, jumlahBaris, barisAkhir, nilai9, 1);
        
    } else if(node.options[node.selectedIndex].value == '2'){
        
        hitung(baris, kolom, jumlahBaris, barisAkhir, 2, nilai8);
        
    } else if(node.options[node.selectedIndex].value == '3'){
        
        hitung(baris, kolom, jumlahBaris, barisAkhir, 3, nilai7);
        
    } else if(node.options[node.selectedIndex].value == '4'){
        
        hitung(baris, kolom, jumlahBaris, barisAkhir, 4, nilai6);
        
    } else if(node.options[node.selectedIndex].value == '5'){
        
        hitung(baris, kolom, jumlahBaris, barisAkhir, 5, nilai5);
        
    } else if(node.options[node.selectedIndex].value == '6'){
        
        hitung(baris, kolom, jumlahBaris, barisAkhir, 6, nilai4);
        
    } else if(node.options[node.selectedIndex].value == '7'){
        
        hitung(baris, kolom, jumlahBaris, barisAkhir, 7, nilai3);
        
    } else if(node.options[node.selectedIndex].value == '8'){
        
        hitung(baris, kolom, jumlahBaris, barisAkhir, 8, nilai2);
        
    } else if(node.options[node.selectedIndex].value == '9'){
        
        hitung(baris, kolom, jumlahBaris, barisAkhir, 9, nilai1);
        
    }
    }
    
    //perhitungan
    function hitung(baris, kolom, jumlahBaris, barisAkhir, nilai1, nilai2)
    {
        //JUMLAH 1
        var nilaiSebelum = $("input#"+baris+kolom).val();
        var jumlahSebelum = $("input#"+barisAkhir+kolom).val();
        var jumlah = jumlahSebelum - nilaiSebelum + nilai2;
        $("input#"+baris+kolom).val(nilai2);
        $("input#"+barisAkhir+kolom).val(jumlah);
        
        //JUMLAH 2
        var nilaiSebelum2 = cekNilai(nilaiSebelum);   
        var jumlahSebelum2 = $("input#"+barisAkhir+baris).val();
        var jumlah2 = jumlahSebelum2 - nilaiSebelum2 + nilai1;
        $("input#"+barisAkhir+baris).val(jumlah2);
        
    }
    
    function cekNilai(sebelum)
    {
        var sebelum2;
        if(sebelum == '0.111'){
            sebelum2 = 9;
        } else if(sebelum == '0.125'){
            sebelum2 = 8;
        } else if(sebelum == '0.142'){
            sebelum2 = 7;
        } else if(sebelum == '0.166'){
            sebelum2 = 6;
        } else if(sebelum == '0.2'){
            sebelum2 = 5;
        } else if(sebelum == '0.25'){
            sebelum2 = 4;
        } else if(sebelum == '0.333'){
            sebelum2 = 3;
        } else if(sebelum == '0.5'){
            sebelum2 = 2;
        } else if(sebelum == '1'){
            sebelum2 = 1;
        } else if(sebelum == '2'){
            sebelum2 = 0.5;
        } else if(sebelum == '3'){
            sebelum2 = 0.333;
        } else if(sebelum == '4'){
            sebelum2 = 0.25;
        } else if(sebelum == '5'){
            sebelum2 = 0.2;
        } else if(sebelum == '6'){
            sebelum2 = 0.167;
        } else if(sebelum == '7'){
            sebelum2 = 0.143;
        } else if(sebelum == '8'){
            sebelum2 = 0.125;
        } else if(sebelum == '9'){
            sebelum2 = 0.111;
        }
        
        return sebelum2;
    }