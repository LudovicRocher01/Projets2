from sympy import *
import random
import math

#Méthode pour générer p et q de k bits
def getprime(k):
	p = randprime(2**(k-1), 2**k)
	return p

#Paillier.KeyGen
def genkeys(k):
    p = getprime(k)
    q = getprime(k)
    while (p==q):
        q = getprime(k)
    N = int(p * q)
    Phi = int( N - p - q +1)
    return [N, mod_inverse(N, Phi)]

#Paillier.Encrypt
def encrypt(m, pk):
    while True:
        r = random.randint(1, pk)
        if (gcd(r, pk) == 1):
            break
    N2 = pk*pk
    c= ((1+pk*m) * pow(r, pk, N2)) % N2
    return int(c)

#Paillier.Decrypt
def decrypt(c, pk, sk):
    N2 = pk*pk
    r = pow(c, sk, pk)
    s = mod_inverse(r, N2)
    m = ((c * pow(s, pk, N2)) % N2 - 1)//pk
    return int(m)

#Addiditivité homomorphe
def oplus(x, y, pk):
    return x * y % (pk**2)


def produitParConstante(x, y, pk):
    return pow(x, y, pk**2)


def oppose(x, pk):
    return mod_inverse(x, pk**2)

pk,sk = genkeys(300)

xa, ya = 3, 3
xb, yb = 320, 459 

def DistanceBob(xa, ya, xb, yb):
     XA, YA = encrypt(xa, pk), encrypt(ya, pk)
        
     bob1 = encrypt(xb**2 + yb**2,pk)
     bob2 = produitParConstante(XA,xb,pk)
     bob3 = produitParConstante(YA,yb,pk)
     bob23 = oplus(bob2,bob3,pk)
     bob23 = produitParConstante(bob23,2,pk)
     bob23 = oppose(bob23,pk)


     bob = oplus(bob1,bob23,pk)
     #le -pk vient du oppose
     alice = decrypt(bob, pk, sk) - pk

     d = alice + xa**2 + ya**2 
     d = math.sqrt(d % pk)
     return d

print(DistanceBob(xa,ya,xb,yb))

def DistanceBob100(xa, ya, xb, yb):
    L = []
    XA, YA = encrypt(xa, pk), encrypt(ya, pk)
    XA2, YA2 = encrypt(xa**2, pk), encrypt(ya**2, pk)

    bob1 = oplus(XA2, YA2, pk)
    bob2 = mod_inverse(pow(pow(XA, xb, pk**2)*pow(YA, yb, pk**2), 2, pk**2), pk**2)
    bob3 = oplus(encrypt(xb**2, pk), encrypt(yb**2, pk), pk)
    bob = bob1 * bob2 * bob3

    for i in range(10000):
        j = random.randint(1, 100)
        L.append(pow(bob*encrypt(-i, pk), j, pk**2))
    
    for i in L:
        if decrypt(i, pk, sk) <= 0:
            return "dAB < 100"
    return "dAB >100"


print(DistanceBob100(xa,ya,xb,yb))