import 'flowbite';

try {

    window.$ = window.jQuery = require('jquery');

    require('select2');
    $('select').select2();

} catch (error) {
    console.log(error);
}
