import React from 'react'


const MyForm = () => {


    const SumAlert = (event) => {
        event.preventDefault()
        const number1 = event.target.number1.value
        const number2 = event.target.number2.value
        const sum = parseInt(number1) + parseInt(number2)
        if (sum % 2 === 0) {
            alert(`La suma de los números es par: ${sum}`)
        } else {
            alert(`La suma de los números es impar: ${sum}`)
        }
    }



  return (
      <form onSubmit={SumAlert}>
          <label>
              Número 1:
              <input type="number" name="number1" />
          </label>
          <label>
              Número 2:
              <input type="number" name="number2" />
          </label>
          <input type="submit" value="Enviar" />
          
    </form>
  )
}

export default MyForm