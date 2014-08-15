$ ->
  checksContainer = $('#checks-rooms-number')
  for i in [1...6]
    if (i == 5)
      checksContainer.append "<div class='btn-group' data-toggle='buttons'><label class='btn btn-sm btn-primary'><input type='radio' name='floors-#{i}-num' id='floors-#{i}-num'>#{i}+</label></div> <small>комнатную</small>"
    else
      checksContainer.append "<div class='btn-group bts-cont-mar-offset' data-toggle='buttons'><label class='btn btn-sm btn-primary'><input type='radio' name='floors-#{i}-num' id='floors-#{i}-num'>#{i}</label></div>"