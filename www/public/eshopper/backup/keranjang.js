{/* <div class="input-group quantity mx-auto" style="width: 100px;">
    <input type="hidden" name="item_id" value="{{ $id }}">
    <a id="btn-minus-{{ $id }}" class="btn btn-sm btn-primary btn-minus" onclick="decrementQuantity(this)"><i class="fa fa-minus"></i></a>
    <input id="input-qty-{{ $id }}" name="quantity" type="text" class="form-control form-control-sm bg-secondary text-center" value="{{ $details['quantity'] }}">
    <a id="btn-plus-{{ $id }}" class="btn btn-sm btn-primary btn-plus" onclick="incrementQuantity(this)"><i class="fa fa-plus"></i></a>
</div> */}


// Ambil elemen-elemen yang dibutuhkan
var inputQty = document.getElementById('input-qty-{{ $id }}');
// Mendapatkan tombol plus dan minus
var btnPlus = document.getElementById('btn-plus-{{ $id }}');
var btnMinus = document.getElementById('btn-minus-{{ $id }}');

var maxQuantity = parseInt("{{ $details['jumlah'] }}");

function incrementQuantity(btnPlus) {
    var inputQty = btnPlus.parentNode.querySelector('input[name="quantity"]');
    var currentValue = parseInt(inputQty.value);

    var maxQuantity = parseInt("{{ $details['jumlah'] }}");

    if (currentValue < maxQuantity) {
        var newQuantity = currentValue + 1;
        inputQty.value = newQuantity;
    }
}

function decrementQuantity(btnMinus) {
    var inputQty = btnMinus.parentNode.querySelector('input[name="quantity"]');
    var currentValue = parseInt(inputQty.value);

    if (currentValue > 1) {
        var newQuantity = currentValue - 1;
        inputQty.value = newQuantity;
    }
}

btnPlus.addEventListener('click', function() {
var currentValue = parseInt(inputQty.value); // Mendapatkan nilai saat ini

    if (currentValue < maxQuantity) {
        var newQuantity = currentValue + 1; // Menambahkan 1 ke nilai saat ini
        inputQty.value = newQuantity; // Mengupdate nilai input quantity
        // updateTotal(newQuantity);
    }
});

// Menambahkan event listener untuk tombol minus
btnMinus.addEventListener('click', function() {
    var currentValue = parseInt(inputQty.value); // Mendapatkan nilai saat ini

    if (currentValue > 1) {
        var newQuantity = currentValue - 1; // Mengurangi 1 dari nilai saat ini
        inputQty.value = newQuantity; // Mengupdate nilai input quantity
        // updateTotal(newQuantity);
    }
});

// Fungsi untuk mengupdate total
function updateTotal(quantity) {
    // var price = {{ $details['harga'] }}; // Harga per item
    var total = price * quantity; // Menghitung total harga

    // Menampilkan total pada elemen dengan ID 'total'
    var totalElements = document.querySelectorAll('.total');
    if (totalElements.length > 0) {
        totalElements.forEach(function(element) {
            element.textContent = 'Rp. ' + total; // Menambahkan "Rp" di depan total
        });
    }
}

// Menginisialisasi total saat halaman dimuat
updateTotal(parseInt(inputQty.value));
