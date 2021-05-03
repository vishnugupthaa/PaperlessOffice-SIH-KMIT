import rsa 

def file_open(file):
    key_file = open(file,'rb')
    key_data = key_file.read()
    key_file.close()
    return key_data

privkey = rsa.PrivateKey.load_pkcs1(file_open('privatekey.key'))

message = file_open('message')
hash_value = rsa.compute_hash(message, 'SHA-512')

signature = rsa.sign(message,privkey,'SHA-512')

s = open('signature_file','wb')
s.write(signature)


pubkey = rsa.PublicKey.load_pkcs1(file_open('publickey.key'))

message = file_open('message')
signature = file_open('signature_file')

try:
    rsa.verify(message,signature,pubkey)
    print("signature succesfully verified")

except:
    print("warning!!!! signature could not be verified")