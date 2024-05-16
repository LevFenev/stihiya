// name="inCollection[]" id="inCollection"
$(function () {
    const inCollection = $('#inCollection');
    $.ajax({
        dataType: 'json',
        type: 'GET',
        async: true,
        url: '/getjson/2',
        success: function (result) {
            if (typeof result.general === "undefined") {
                alert('Incorrect response');
                return false;
            }
            for (let i in result.general) {
                if (result.general.hasOwnProperty(i)) {
                    let name = result.general[i];
                    inCollection.append(`<span><input type="checkbox" value="${i}" name="inCollection[]">${name}</span>`);
                }
            }
            quickSearch();
            /*for (let [i, name] of result.general) {
                console.log(i, name);
            }*/
        },
        complete: function () {
            console.log('Finished!');
        }
    });
    // inCollection.append('<option>Название</option>')
    // inCollection.append('<option>Содержание</option>')
    // inCollection.append('<option>Дата написания</option>')

    // ПОИСК СТИХА
    function quickSearch() {
        const searchInput = $('#quickSearch input'); // тут блок инпута
        searchInput.keyup(function () {
            console.log('keyup');
            let val = $(this).val(); // а тут строка внутри поля ввода
            console.log(val);
            $('#inCollection span').show();
            $('#inCollection span').each(function () {
                console.log($(this).text());
                let r = new RegExp(val, 'gi'); // regular expression, global i - CaseInsensitive
                if($(this).text().search(r)<0) {
                    $(this).hide();
                }
            })
        })
    }
});
