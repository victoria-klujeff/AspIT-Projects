using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Repository
{
    /// <summary>
    /// This class works as a simple datatype containing a fields and the correlating properties.
    /// It means that this class can hold objects of the type ClassDieselPrice, which here corresponds with our suppliers
    /// and the data we need to be able to contain to hold an object of type ClassDieselPrice
    /// It inherets ClassNotify, so the properties can be made with a call to the method Notify().
    /// </summary>
    public class ClassDieselPrice : ClassNotify
    {

        private int _Id;
        private DateTime _date;
        private double _price;

        public ClassDieselPrice()
        {
            Id = 0;
            date = DateTime.Now;
            price = 0;
        }


        public double price
        {
            get { return _price; }
            set
            {
                if (_price != value)
                {
                    _price = value;
                }
                Notify("price");
            }
        }


        public DateTime date
        {
            get { return _date; }
            set
            {
                if (_date != value)
                {
                    _date = value;
                }
                Notify("date");
            }
        }


        public int Id
        {
            get { return _Id; }
            set
            {
                if (_Id != value)
                {
                    _Id = value;
                }
                Notify("Id");
            }
        }

    }
}
