#1
def sumar(numero1, numero2):
    print(numero1 + numero2)

sumar(15,25)

#fin primer ejercicio

#2
def suma(numbers):
    result = 0
    for number in numbers:
        result += number
    print(result)

suma([4,5])
#fin segundo ejercicio

#3
# a, b = 0,  1
# while b < 10:
#     print(b)
#     a, b = b, a+b 
#fin tercer ejercicio

#4
def fibonacci(n):
    """Escribe la serie fibonacci hasta n."""
    a, b = 0, 1
    while b < n:
        print(b),
        a, b = b, a+b
    
fibonacci(2000)

#5


def pedir_confirmacion(reintentos=4, queja='Si o no, por favor!'):
    while True:
        ok = str(input("Si o No:  "))
        if ok in ('s', 'S', 'si', 'Si', 'SI'):
            return True
        if ok in ('n', 'no', 'No', 'NO'):
            return False
        reintentos = reintentos - 1
        if reintentos < 0:
            raise IOError('usuario duro')
    print(queja)


pedir_confirmacion()
