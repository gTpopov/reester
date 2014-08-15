# (($) ->
#  for i in [0...6]
#    if
#    $("#select-floors-size").appendTo "<select>"+i+"</select>"
# ) jQuery

$ ->
  element = $('#select-floors-size')
  for i in [0..5]
    if i == 5
      element.appendTo "<option>"+i+"+</option>"
    else
      element.appendTo "<option>"+i+"</option>"