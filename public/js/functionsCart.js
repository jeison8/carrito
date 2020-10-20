
window.onload = function() {

  articles = JSON.parse(localStorage.getItem('cart')) || [];
  items = JSON.parse(localStorage.getItem('items')) || 0;
  subtotal = JSON.parse(localStorage.getItem('subtotal')) || 0;

  cartPrint();
  htmlPrint();
  TotalPrint();
  

    if(items > 0){  
      document.getElementById("qty").classList.add('qty');
    }
}

function cartPrint(){

  if(Object.keys(articles).length == 0 ){

    const table = document.createElement('div');
    table.innerHTML = `<h4> No hay articulos en el carrito, da click <a onclick="window.location.href='/'" style="cursor: pointer; color:#D10024;">aqui</a> para seguir comprando</h4>`;
    document.getElementById("table_id").appendChild(table);

  }else{

        const thead = document.createElement('tr');  
        thead.innerHTML = 
        `<th width="100"><h4 class="title">Productos</h4></th>
          <th width="700"></th>
          <th width="100"><h4 class="title">Precio</h4></th>  
          <th width="100"></th>`;

        document.getElementById('thead').appendChild(thead);

      articles.forEach( article => {

        const table = document.createElement('tr');  
        table.innerHTML = 
          `<td>
              <img src="${protocol+'//'+host+'/'+article.img}" width="200px">
          </td>
          <td>
              <h4 class="product-name">${article.name}</h4>
              <small><span id="items">1</span> Articulo</small>
          </td>
          <td>
              <h4>$${new Intl.NumberFormat().format(article.price)}</h4>
          </td>
          <td>
              <button class="header-cart" onclick="destroyCart(${article.id},'cart')">x</button>
              <small>Eliminar</small>
          </td>`; 

        document.getElementById('table_id').appendChild(table);

      });

      const send = document.createElement('section');  
        send.innerHTML = 
          `<img width="90" src="${protocol+'//'+host+'/img/images.jpg'}">&nbsp;&nbsp;&nbsp;&nbsp;
          <h4 style="display: inline">Tienes envio gratis en esta compra</h4>`;

      document.getElementById('logosend').appendChild(send);

      const tablesend = document.createElement('section');  
        tablesend.innerHTML = 
          `<hr>
            <div class="table-responsive">
                <table>
                    <tbody>
                    <tr>
                        <th width="500"><h4 class="title" style="color:gray">Subtotal:</h4></th>
                        <th><h4 id="subtotal" style="color:gray">$</h4></th>
                    </tr>
                    <tr>
                        <th width="500"><h4 class="title" style="color:gray">Envio:</h4></th>
                        <th><h4 class="title" style="color:gray">Gratis</h4></th>
                    </tr>
                    <tr>
                        <th width="500"><h4 class="title">TOTAL:</h4></th>
                        <th><h4 id="total">$</h4></th>
                    </tr>
                    </tbody>
                </table>
            </div>
            <button class="cart-bottom" style="background-color:#333" onclick="window.location.href='/'">SEGUIR COMPRANDO</button>
            <button class="cart-bottom" style="background-color:#333"onclick="emptyCart(1)">VACIAR CARRITO</button>
            <button class="cart-bottom" onclick="viewOrder()">CREAR ORDEN&nbsp;<i class="fa fa-arrow-circle-right"></i></button>`;

      document.getElementById('tablesend').appendChild(tablesend);
 
  }

}

function TotalPrint(){

  let Total = new Intl.NumberFormat().format(subtotal);

  document.getElementById('subtotal').append(Total);
  document.getElementById('total').append(Total);

}
