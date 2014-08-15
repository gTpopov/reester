$ ->
  element = $('#select-floors-number')
  for i in [1..5]
    if i == 5
      element.append "<option value='"+i+"'>"+i+"+</option>"
    else
      element.append "<option value='"+i+"'>"+i+"</option>"