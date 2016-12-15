$(document).ready(function () {
    var pageL = '';
    $('#pagination').twbsPagination({
        totalPages: 10,
        visiblePages:3,
        onPageClick: function (event, page) {
            pageL=page;
            getData(pageL);
        }
    });
    $('#search').on('keyup change', function(){
        getData(pageL);
    });
});

$("#checkAll").change(function () {
    // if($(this).is(":checked"))
    //     $('#deleteChecked').slideDown();
    // else
    //     $('#deleteChecked').fadeOut();
    $(".checkBox").prop('checked', $(this).prop("checked"));
});

function getData(page) {
    var arr = 0;
    $.ajax({
        type: 'get',
        url: "view-faculty/fsearch?page=" + page,
        dataType: "json",
        data: {'search': $('#search').val()},
        success:function(data){
            var result = (data["data"]);
            var rows = '';
            $(result).each(function (key, value) {
                rows = rows + '<tr>'+
                                '<td><input type="checkbox" name="chkbox" value=' + value.name + ' class="checkBox"></td>'+
                                '<td><strong>' + ++arr + '.</strong></td>' +
                                '<td>' + value.name + '</td>' + 
                                '<td>' + value.email + '</td>' +
                                '<td>' + value.contact + '</td>' +
                                '<td><a href="profileFaculty/'+ value.name +'" class="btn btn-default btn-primary btns">Open</a></td>'+
                            '</tr>';
            });
            $('tbody').html(rows);
        }
    });
}

$('#deleteChecked').click(function () {
    $("input[name=chkbox]:checked").each(function () {
        $.ajax({
            url: 'deleteFaculty/' + $(this).val(),
            type: 'get',
            success: function () {
                $("input[name=chkbox]:checked").closest("tr").fadeOut();
                window.location.reload(true);
            }
        });
    });
});