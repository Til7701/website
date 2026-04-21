function Table(el)
  -- Wrap the table in a Div with class "table-wrapper"
  return pandoc.Div({el}, { class = "table-wrapper" })
end
