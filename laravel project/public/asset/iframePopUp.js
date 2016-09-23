$(function () {
    /* 本番用(URL切り替え)
    var nowUrl = location.href;
    if (!nowUrl.match(/^https:/)) {
        nowUrl = nowUrl.replace(/^http:/, "https:");
        location.href = nowUrl;
    }
    */
});

$('#alertInformation').on('click', function () {
    $('body').append(GetLoadingElement());
    $.ajax({
        type: 'GET',
        url: '/Alert/GetAlertInformation/',
        dataType: 'JSON',
        contentType: 'application/json; charset=utf-8'
    }).done(function (data) {
        var isError = AjaxErrorCheck(data.Results);
        if (isError == false) {
            var records = data.Data.AlertInformation;
            if (records != null) {
                SetAlertInformation(records);
            }
        }
    }).error(function (data) {
        swal('通信エラーが発生しました。', '', 'warning');
    }).complete(function () {
        $('body').find('.loading').remove();
    });

    function SetAlertInformation(records) {
        $('#informationList').find('li').remove();
        var elements = '';
        var count = records.length;
        $('#informationCount').text(count);
        $('#informationCountMessage').html(count + '件のお知らせ<span style="float:right;"><a href="#" onclick="errorPagePopup();">一覧</a></span>');
        $.each(records, function (i, record) {
            elements += '<li class="hoge"><a href="#"><i class="fa fa-cogs danger"></i>' + record.Content + '[' + record.DateCreated.replace('T', ' ') + ']</a><span class="deleteMessage" data-id="' + record.Id + '"><i class="fa fa-times-circle"></i></span></li>';
        });
        $('#informationList').append(elements);
    }
});

$('#informationList').on('click', '.deleteMessage', function () {
    $('body').append(GetLoadingElement());
    var id = $(this).attr('data-id');
    var li = $(this).closest('li');
    $.ajax({
        type: 'GET',
        url: '/Alert/Delete/',
        dataType: 'JSON',
        contentType: 'application/json; charset=utf-8',
        data: { alertInformationId: id }
    }).done(function (data) {
        var isError = AjaxErrorCheck(data.Results);
        if (isError == false) {
            $(li).remove();
            var count = $('#informationCount').text();
            $('#informationCount').text(count - 1);
        }
    }).error(function (data) {
        swal('通信エラーが発生しました。', '', 'warning');
    }).complete(function () {
        $('body').find('.loading').remove();
    });

    return false
});

function errorPagePopup() {
    var pop = window.open("/Alert/Index/", "t_pop", "width=1000,height=800,scrollbars=no");
    pop.focus();
}

ScrollY = 0;

function resetScroll() {
    //$('html,body').css('overflow', '');
    //$('html,body').css('height', '');
    $('html').css('overflow', 'auto');
    $(window).scrollTop(ScrollY);
    $('html').css('overflow', 'auto');
}

var _openIframe = function (event, param) {
    ScrollY = $(window).scrollTop();

    $('html,body').css('overflow', 'hidden');
    $('html,body').css('height', '100%!important');

    var url = param.url;
    var title = param.title;
    var headLine = $("h1").html();

    var modalBox = $("<div>").addClass("modals").attr("id", "modalBox");
    var modalInner = $("<div>").attr("id", "modalInner");
    var a = $("<a href='#' class='modalClose'><i class='fa fa-times'></i></a>");
    var p = $("<p>").html(headLine + "枠「" + title + "」").attr("id", "modalFirst");
    var iframe = $("<iframe>").attr("src", url).css({ "width": "100%", "height": "100%", "frameborder": "0", "scrolling": "none" });

    var element = modalBox.append(modalInner.append(p.append(a)).append(iframe));

    var dummyText = $('<input type="text" />');

    $("body").append(dummyText);

    iframe.on("load", param, event);

    $("body").append(element);

    dummyText.remove();

    //モダルウィンドウ閉じ制御
    element.on("click", ".modalClose", function () {
        $(".modals").fadeOut("fast", function () {
            $(this).remove();
            resetScroll();
        });

        return false;
    });

    return false;
}

$('input[type="text"]').on('click', function () {
    $(this).focusin();
});

function closeFirst() {
    $('.modals').fadeOut('fast', function () { $(this).remove(); });
    resetScroll();
}

//モダルウィンドウ閉じ制御-リンク対応
$('.frameClose').on('click', function () {
    $('.modals', parent.document).fadeOut();
    $('#modalFirst', top.document).find('a').css('display', 'block');
    window.parent.$('html').css('overflow', 'auto');
    resetScroll();
    return false;
});

//モダルウィンドウ閉じ制御-HOMEへ
$(".frameCloseToTop").on("click", function () {
    $('.modals', parent.document).fadeOut();
    window.parent.location.href = $(this).attr('href');

    return false;
});

function previewDesignPopUp(url) {
    var pop = window.open(url, 't_pop', 'width=800,height=800,scrollbars=no');
    pop.focus();
}

// iframeモダルウィンドウポップアップ・２層
var _openSubIframe = function (event, param) {
    var secondContents = param.contents;
    $(secondContents).find('html,body').css('overflow', 'hidden');
    $(secondContents).find('html,body').css('height', '100%!important');

    var url = param.url;
    var modalBox = $('<div>').addClass('modals second').attr('id', 'modalBox');
    var modalInner = $('<div>').attr('id', 'modalInner');
    var a = $('<a href="#" class="modalClose"><i class="fa fa-times"></i></a>')
    var p = $('<p>').attr('id', 'modalSecond');
    var iframe = $('<iframe>').attr('src', url).css({ 'width': '100%', 'height': '100%', 'frameborder': '0', 'scrolling': 'none' });

    var element = modalBox.append(modalInner.append(p.append(a)).append(iframe));

    iframe.on('load', param, event);

    $('#modalFirst', parent.document).find('a').css({ 'display': 'none' });
    $(param.contents).find('body').append(element);

    //モダルウィンドウ閉じ制御
    element.on('click', '.modalClose', function () {
        $(secondContents).find('html,body').css('overflow', 'auto');
        $(secondContents).find('html,body').css('height', 'auto');
        $(secondContents).find('.modals').fadeOut('fast', function () {
            $(this).remove();
        });
        $('#modalFirst', parent.document).find('a').css('display', 'block');

        return false;
    });

    return false;
}

// iframeモダルウィンドウポップアップ・３層 - 黒から黒
var _openThirdIframe = function (event, param) {
    var url = param.url;
    var modalBox = $('<div>').addClass('modals second third').attr('id', 'modalBox');
    var modalInner = $('<div>').attr('id', 'modalInner');
    var p = $('<p>').attr('id', 'modalSecond');
    var iframe = $('<iframe>').attr('src', url).css({ 'width': '100%', 'heightv': '100%', 'frameborder': '0', 'scrolling': 'none' });

    var element = modalBox.append(modalInner.append(iframe));

    iframe.on('load', param, event);

    var parentFrame = $('body', parent.document);
    parentFrame.find('.modals:last-child iframe').contents().find('body').append(element);

    return false;
}

//3層目閉じ
function closeThird() {
    $('.modals.third', parent.document).fadeOut('fast', function () { $(this).remove(); });
    return false;
}

function AjaxErrorCheck(results) {
    var ret = false;
    $.each(results, function (index, value) {
        if (value.Result != 1) {
            ret = true;
            var details = value.Details;
            $.each(details, function (index, detail) {
                if (detail.Message) {
                    swal(detail.Message, '', 'warning');
                } else if (detail.OriginalMessage) {
                    swal(detail.OriginalMessage, '', 'warning');
                } else {
                    swal('エラーが発生しました。', '', 'warning');
                }
            });
        }
    });

    return ret;
}

function GetLoadingElement() {
    var loadingElement = '<div id="modalBox" class="modals loading">' +
                                    '<i class="fa fa-spinner fa-pulse" style="font-size:60px; position:absolute;top:50%;left:50%;margin:-30px 0 0 -30px;z-index: 9999;color: #FFF;"></i>' +
                                    '</div>';

    return loadingElement;
}

function EscapeHtml(value) {
    var ret = '';
    if (value != null) {
        ret = value.replace(/&/g, '&amp;')
          .replace(/</g, '&lt;')
          .replace(/>/g, '&gt;')
          .replace(/`/g, '&#x60;')
          .replace(/"/g, '&quot;')
          .replace(/'/g, '&#039;');
    }

    return ret;
}
