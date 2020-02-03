#Ejercicio 1
def max():
    numero1 = int(input("Ingrese el número 1: "))
    numero2 = int(input("Ingrese el número 2: "))
    if numero1<numero2:
        print(f"El número mayor es {numero2}")
    else:
        print(f"El número mayor es {numero1}")
    if(numero1==numero2): 
        print("Los números son iguales")

max()

#ejerciio2


def max_tres():
    numero1 = int(input("Ingrese el número 1: "))
    numero2 = int(input("Ingrese el número 2: "))
    numero3 = int(input("Ingrese el número 3: "))
    if numero1 < numero2 and numero3 < numero2:
        print(f"El número mayor es {numero2}")
    if numero2 < numero1 and numero3 < numero1:
        print(f"El número mayor es {numero1}")
    if numero1 < numero3 and numero2 < numero3:
        print(f"El número mayor es {numero3}")
    if numero1 == numero2 and numero2==numero3:
        print("Los números son iguales")


max_tres()
