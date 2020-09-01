def append_letters(letters_to_append, letter_list):
  result = []
  for letter in letters_to_append:
    for plus_letter in letter_list:
      sl = letter + plus_letter
      result.append(sl)
  return result

def create_all(sols):
  re = []
  letters_to_append = sols[0]
  letters_lists = sols[1:]
  for letter_list in letters_lists:
    re = append_letters(letters_to_append, letter_list)
    letters_to_append = re
  print(re)


sols = ['t', 'e', 's', 't', 'ea']
create_all(sols)