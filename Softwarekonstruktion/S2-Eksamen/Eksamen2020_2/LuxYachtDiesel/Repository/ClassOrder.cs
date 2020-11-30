using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Repository
{
    /// <summary>
    /// This class works as a simple datatype containing a fields and the correlating properties.
    /// It means that this class can hold objects of the type ClassOrder, which here corresponds with orders
    /// and the data we need to be able to contain to hold an object of type ClassOrder.
    /// It inherets ClassNotify, so the properties can be made with a call to the method Notify().
    /// </summary>
    public class ClassOrder : ClassNotify
    {

        private DateTime _date;
        private double _price;
        private double _customerRate;
        private double _supplierRate;
        private double _ownProfit;
        private int _volume;
        private ClassCustomer _customer;
        private ClassSupplier _supplier;


        public ClassOrder()
        {
            date = DateTime.Now;
            price = 0;
            customerRate = 0;
            supplierRate = 0;
            ownProfit = 0;
            volume = 0;
            customer = new ClassCustomer();
            supplier = new ClassSupplier();
        }


        public ClassSupplier supplier
        {
            get { return _supplier; }
            set
            {
                if (_supplier != value)
                {
                    _supplier = value;
                }
                Notify("supplier");
            }
        }

        public ClassCustomer customer
        {
            get { return _customer; }
            set
            {
                if (_customer != value)
                {
                    _customer = value;
                }
                Notify("customer");
            }
        }


        public int volume
        {
            get { return _volume; }
            set
            {
                if (_volume != value)
                {
                    _volume = value;
                }
                Notify("volume");
            }
        }


        public double ownProfit
        {
            get { return _ownProfit; }
            set
            {
                if (_ownProfit != value)
                {
                    _ownProfit = value;
                }
                Notify("ownProfit");
            }
        }


        public double supplierRate
        {
            get { return _supplierRate; }
            set
            {
                if (_supplierRate != value)
                {
                    _supplierRate = value;
                }
                Notify("supplierRate");
            }
        }


        public double customerRate
        {
            get { return _customerRate; }
            set
            {
                if (_customerRate != value)
                {
                    _customerRate = value;
                }
                Notify("customerRate");
            }
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


    }
}
