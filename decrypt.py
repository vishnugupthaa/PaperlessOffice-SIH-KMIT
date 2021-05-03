import rsa 
def file_open(file):
    key_file = open(file,'rb')
    key_data = key_file.read()
    key_file.close()
    return key_data

pubkey = rsa.PublicKey.load_pkcs1(file_open('publickey.key'))

message = file_open('message')
signature = file_open('signature_file')

try:
    rsa.verify(message,signature,pubkey)
    print("signature succesfully verified")

except:
    print("warning!!!! signature could not be verified")
    