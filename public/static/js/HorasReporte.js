//export default class HorasReporte
class HorasReporte
{
    lista_horas= {"ingresos": new Array, "salidas" : new Array} ;
    totalMinutos= 0;
    totalMenu=0.00;
    horasyMinutos;

    constructor(lista_horas)
    {
        this.lista_horas = lista_horas;
        this.totalMinutos = this.calcularMinutosTotales();
        this.horasyMinutos = this.calcularHorasyMinutos();

    }
    calcularMinutosTotales()
    {
        let sumaTotal = 0;
        
        let ingresos = this.lista_horas["ingresos"];
        let salidas = this.lista_horas["salidas"];

        for(var i=0; i<6 ;i++)
        {
            if(ingresos[i]!==0 && salidas[i]!==0){
                let subTotal = (salidas[i].getTime() - ingresos[i].getTime())/1000/60;
                sumaTotal += subTotal;
            }
        }
        return sumaTotal;
    }
    calcularHorasyMinutos()
    {
      var horas = Math.trunc((this.totalMinutos)/60);
      var minutos = this.totalMinutos % 60;
      return horas + " hrs " + minutos + " min";
    }

    setlista_horas(lista_horas)
    {
      this.lista_horas = lista_horas;
      this.totalMinutos = this.calcularMinutosTotales();
      this.horasyMinutos = this.calcularHorasyMinutos();
    }
}
