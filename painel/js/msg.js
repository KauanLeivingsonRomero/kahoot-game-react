//pega valor get na url
var valor;
var query = location.search.slice(1);
var partes = query.split('&');
var data = {};
partes.forEach(function (parte) {
  var chaveValor = parte.split('=');
  var chave = chaveValor[0];
  valor = chaveValor[1];
  data[chave] = valor;
});

// if (typeof valor != "undefined") {
//   valor = decode_base64(valor);
// }


  if(valor == 'err'){
    Swal.fire({
      icon: 'info',
      html:'Alteração mal-sucedida.',
      showCloseButton: true,
      focusConfirm: false,
      confirmButtonText:'OK',
      confirmButtonColor: '#9E0CAB',
      timer: 10000
    })

  }else if(valor == 'ok'){
    Swal.fire({
      icon: 'success',
      html:'Alterações feitas com sucesso!',
      showCloseButton: true,
      focusConfirm: false,
      confirmButtonText:'OK',
      confirmButtonColor: '#9E0CAB'
    })
  }else if(valor == 'errfile'){
    Swal.fire({
      icon: 'info',
      html:'Alteração mal-sucedida<br>Tente formatos diferentes ou arquivos mais leves.',
      showCloseButton: true,
      focusConfirm: false,
      confirmButtonText:'OK',
      confirmButtonColor: '#9E0CAB'
    })
  }
  
  
function decode_base64(s)
{
    var e = {}, i, k, v = [], r = '', w = String.fromCharCode;
    var n = [[65, 91], [97, 123], [48, 58], [43, 44], [47, 48]];

    for (z in n)
    {
        for (i = n[z][0]; i < n[z][1]; i++)
        {
            v.push(w(i));
        }
    }
    for (i = 0; i < 64; i++)
    {
        e[v[i]] = i;
    }

    for (i = 0; i < s.length; i+=72)
    {
        var b = 0, c, x, l = 0, o = s.substring(i, i+72);
        for (x = 0; x < o.length; x++)
        {
            c = e[o.charAt(x)];
            b = (b << 6) + c;
            l += 6;
            while (l >= 8)
            {
                r += w((b >>> (l -= 8)) % 256);
            }
         }
    }
    return r;
}
