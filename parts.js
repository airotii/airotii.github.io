$(document).ready(function() {
  $(".mbList").hide();
  $(".cpuList").hide();
  $(".gpuList").hide();
  $(".psuList").hide();
  $(".casesList").hide();
  $(".monitorList").hide();
  $(".keyboardList").hide();
  $(".memoryList").hide();

  $("#mthrBrd").click(function() {
    $(".mbList").show();
    $(".cpuList").hide();
    $(".gpuList").hide();
    $(".psuList").hide();
    $(".casesList").hide();
    $(".monitorList").hide();
    $(".keyboardList").hide();
    $(".memoryList").hide();
    $("#buildapcPng").hide();
  });

  $("#cpu").click(function() {
    $(".cpuList").show();
    $(".gpuList").hide();
    $(".mbList").hide();
    $(".psuList").hide();
    $(".casesList").hide();
    $(".monitorList").hide();
    $(".keyboardList").hide();
    $(".memoryList").hide();
    $("#buildapcPng").hide();
  });

  $("#gpu").click(function() {
    $(".gpuList").show();
    $(".mbList").hide();
    $(".cpuList").hide();
    $(".psuList").hide();
    $(".casesList").hide();
    $(".monitorList").hide();
    $(".keyboardList").hide();
    $(".memoryList").hide();
    $("#buildapcPng").hide();
  });

  $("#memory").click(function() {
    $(".memoryList").show();
    $(".mbList").hide();
    $(".cpuList").hide();
    $(".gpuList").hide();
    $(".psuList").hide();
    $(".casesList").hide();
    $(".monitorList").hide();
    $(".keyboardList").hide();
    $("#buildapcPng").hide();
  });

  $("#psu").click(function() {
    $(".psuList").show();
    $(".mbList").hide();
    $(".cpuList").hide();
    $(".gpuList").hide();
    $(".casesList").hide();
    $(".monitorList").hide();
    $(".keyboardList").hide();
    $(".memoryList").hide();
    $("#buildapcPng").hide();
  });

  $("#case").click(function() {
    $(".casesList").show();
    $(".psuList").hide();
    $(".mbList").hide();
    $(".cpuList").hide();
    $(".gpuList").hide();
    $(".monitorList").hide();
    $(".keyboardList").hide();
    $(".memoryList").hide();
    $("#buildapcPng").hide();
  });

  $("#monitor").click(function() {
    $(".monitorList").show();
    $(".casesList").hide();
    $(".psuList").hide();
    $(".mbList").hide();
    $(".cpuList").hide();
    $(".gpuList").hide();
    $(".keyboardList").hide();
    $(".memoryList").hide();
    $("#buildapcPng").hide();
  });

  $("#keyboard").click(function() {
    $(".keyboardList").show();
    $(".monitorList").hide();
    $(".casesList").hide();
    $(".psuList").hide();
    $(".mbList").hide();
    $(".cpuList").hide();
    $(".gpuList").hide();
    $(".memoryList").hide();
    $("#buildapcPng").hide();
  });

  var addtoListButtons = document.getElementsByClassName("addtoList");
  for (var i = 0; i < addtoListButtons.length; i++) {
    var button = addtoListButtons[i];
    button.addEventListener("click", addtoList);
  }

  function addtoList(event) {
    var button = event.target;
    var part = button.parentElement;
    var title = part.getElementsByClassName("part-title")[0].innerText;
    var price = part.getElementsByClassName("part-price")[0].innerText;

    var removeButton = "<img src='trash-2.svg' class='btn remove'";

    var createList =
      "<div class='list-part'>" +
      "<div class='list-title'>" +
      "Part Title: " +
      title +
      "</div>" +
      "<div class='list-price'>" +
      price +
      "</div>" +
      removeButton +
      "<hr>" +
      "</div>";

    $(".list").append(createList);
    updateListTotal();

    function removeListPart(event) {
      var button = event.target;
      button.parentElement.remove();
      updateListTotal();
    }

    var removeListPartsButton = document.getElementsByClassName("remove");
    for (var i = 0; i < removeListPartsButton.length; i++) {
      var button = removeListPartsButton[i];
      button.addEventListener("click", removeListPart);
    }

    function updateListTotal() {
      var list = document.getElementsByClassName("list")[0];
      var listParts = list.getElementsByClassName("list-part");
      var total = 0;
      for (var i = 0; i < listParts.length; i++) {
        var listPart = listParts[i];
        var price = listPart.getElementsByClassName("list-price")[0];

        var price = parseFloat(price.innerText.replace("$", ""));
        total = total + price;
      }
      total = Math.round(total * 100) / 100;
      document.getElementsByClassName("list-total")[0].innerText =
        "Total: " + "$" + total;
    }
  }
});
