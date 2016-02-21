import hashlib
import uuid

def biometric_hash():
    jpeg_path = '/opt/lampp/htdocs/biometric_dir/fingerprint1.dat'
    salt = "this is a salt"
    hasher = hashlib.sha512(salt)
    with open(jpeg_path, 'rb') as afile:
        buf = afile.read()
        hasher.update(buf)
    crypto = hasher.hexdigest()
    return crypto

print biometric_hash()
