// name="inCollection[]" id="inCollection"
$(function () {
    const inCollection = $('#inCollection');
    const poem_id = $('#poem_id').val(); // #poem_id - обращение к инпуту с poem_id
    $.ajax({
        dataType: 'json',
        type: 'GET',
        async: true,
        url: `/getpoemjson/${poem_id}`,
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
        /*complete: function () {
            console.log('Finished!');
        }*/
    });
    // inCollection.append('<option>Название</option>')
    // inCollection.append('<option>Содержание</option>')
    // inCollection.append('<option>Дата написания</option>')

    // ИМЕНА АВТОРОВ
    const chooseAuthor = $('#chooseAuthor');
    $.ajax({
        dataType: 'json',
        type: 'GET',
        async: true,
        url: '/getauthorjson',
        success: function (result) {
            if (typeof result.authorNames === "undefined") {
                alert('Incorrect response');
                return false;
            }
            for (let i in result.authorNames) {
                if (result.authorNames.hasOwnProperty(i)) {
                    let authorName = result.authorNames[i];
                    chooseAuthor.append(`<span><input type="radio" value="${i}" name="chooseAuthor">${authorName}</span>`);
                }
            }
        }
    });

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
                if ($(this).text().search(r) < 0) {
                    $(this).hide();
                }
            })
        })
    }

    $('.like-buttons div').click(function () {
        let element_name = $(this).parent().data('element_name');
        let element_id = $(this).parent().data('id');
        let reaction_id = $(this).data('rid');
        console.log(element_id, element_name, reaction_id);
    });
});

function getLikesJSON(element_type, element_id) { // does not appear on the page
    $(function () {
        const likesButtons = $('#likesButtons');
        likesButtons.data('element-type', element_type);
        likesButtons.data('element-id', element_id);

        console.log('likes');
        $.ajax({
            dataType: 'json',
            type: 'GET',
            async: true,
            url: '/getlikesjson',
            success: function (result) {
                if (typeof result.reactionNames === "undefined") {
                    alert('Incorrect response');
                }
                for (let i in result.reactionNames) {
                    if (result.reactionNames.hasOwnProperty(i)) {
                        let reactionName = result.reactionNames[i];
                        likesButtons.append(`<span><button data-reaction-id="${i}">${reactionName}</button></span>`)
                    }
                }
                likesButtons.find('button').click(function () {

                    $.ajax({
                        dataType: 'json',
                        type: 'GET',
                        async: true,
                        url: '/to-like',
                        data: {
                            element_id: likesButtons.data('element-id'),
                            element_type: likesButtons.data('element-type'),
                            reaction_id: $(this).data('reaction-id')
                        },
                        success: function (result) {
                            console.log('Like data received.')
                        }
                    })
                });
            }
        });
    });
}
