function showSweetAlert(title, text) {
  swal({
    title: title,
    text: text,
    icon: "error",
    button: "OK",
  });
}

function alertWarning(title, text, link) {
  swal({
    title: title,
    icon: "warning",
    dangerMode: true,
    content: {
      element: "p",
      attributes: {
        innerHTML: text,
        style: "text-align:center; color:red; display: block;",
      }
    },
  }).then((willDelete) => {
    if (willDelete) {
      window.location.href = link;
    }
  });
}
function alertSuksess(title, text, link) {
  swal({
    title: title,
    text: text,
    icon: "success",
    dangerMode: true,
  }).then((willDelete) => {
    if (willDelete) {
      window.location.href = link;
    }
  });
}
function alertSuksess(title, text) {
  swal({
    title: title,
    text: text,
    icon: "success",
    dangerMode: true,
  });
}
function alertConfirm(title, text, link) {
  event.preventDefault();
  swal({
    title: title,
    text: text,
    icon: "warning",
    buttons: {
      cancel: "Cancel",
      confirm: {
        text: "Yes, Logout!!",
        value: true,
        visible: true,
        className: "confirm-button",
        closeModal: true,
      },
    },
    dangerMode: true,
  }).then((willDelete) => {
    if (willDelete) {
      window.location.href = link;
    }
  });
}
