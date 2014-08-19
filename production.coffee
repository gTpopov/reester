$ ->
  checksContainer = $('#checks-rooms-number').children('.row').children('.btn-group')
  for i in [1...6]
    if (i == 5)
      checksContainer.append "<label class='btn btn-primary'><input type='radio' name='floors-#{i}-num' id='floors-#{i}-num'>#{i}+</label>"
    else
      checksContainer.append "<label class='btn btn-primary'><input type='radio' name='floors-#{i}-num' id='floors-#{i}-num'>#{i}</label>"
