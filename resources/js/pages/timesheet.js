import executeExample from "../../../public/assets/js/pages/sweetalert.init";

$(document).ready(function() {
    let selectInitialized = false;
    let select = $('#timesheetSelect');

    function initializeSelect() {
        if (!selectInitialized) {
            new Selectr('#timesheetSelect');
            selectInitialized = true;
        }
    }
    $.ajax({
        url: "api/fetch-timesheet",
        method: 'GET',
        success: function(response, textStatus, xhr) {
            select.empty();
            response.data.forEach(function(item) {
                select.append(new Option(item.name, item.name));
            });
            initializeSelect();
        },
        error: function(response, textStatus, xhr) {
            executeExample(textStatus === "error", response.message);
        }
    });
    $('#createData').submit(function(e) {
        e.preventDefault();
        let timesheetId = $('#timesheetSelect').val();
        if (!timesheetId) {
            executeExample('error', 'Please select a timesheet first.');
            return;
        }
        $.ajax({
            url: "api/fetch-timesheet/store",
            method: 'POST',
            data: {
                timesheet_id: timesheetId,
                _token: $('input[name="_token"]').val()
            },
            success: function(response, textStatus, xhr) {
                if (textStatus === 'error' || xhr.status !== 200) {
                    executeExample(textStatus, response.message);
                } else {
                    executeExample(textStatus, response.message).then(() => {
                        $('#createData')[0].reset();
                        select.val('').trigger('change');
                        location.reload();
                    });
                }
            },
            error: function(response, textStatus, xhr) {
                executeExample(textStatus === "error", response.message);
            }
        });
    });
    $('.btn-delete').click(function() {
        let nameId = $(this).data('name');
        executeExample('warningConfirm').then(function (result) {
            if (result.isConfirmed) {
                $.ajax({
                    url: '/api/timesheet/' + nameId,
                    type: 'DELETE',
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                    },
                    success: function (response, textStatus, xhr) {
                        if (textStatus === 'success' && xhr.status === 200) {
                            executeExample(textStatus, response.message).then(() => {
                                location.reload();
                            });
                        } else {
                            executeExample(textStatus === "error", response.message);
                        }
                    },
                    error: function (response, textStatus, xhr) {
                        executeExample(textStatus === 'error', xhr.responseJSON.message);
                    }
                });
            }
        });
    });
});
