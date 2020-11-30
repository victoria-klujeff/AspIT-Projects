using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Repository
{
    /// <summary>
    /// This class works as a simple datatype containing a fields and the correlating properties.
    /// It means that this class can hold objects of the type ClassCustomer, which here corresponds with our customers
    /// and the data we need to be able to contain to hold an object of type ClassCustomer
    /// It inherets ClassNotify, so the properties can be made with a call to the method Notify().
    /// </summary>
    public class ClassCustomer : ClassNotify
    {
        private int _Id;
        private string _name;
        private string _address;
        private string _city;
        private string _postalCode;
        private ClassCountry _country;
        private string _phone;
        private string _mailAdr;

        public ClassCustomer()
        {
            Id = 0;
            name = "";
            address = "";
            city = "";
            postalCode = "";
            country = new ClassCountry();
            phone = "";
            mailAdr = "";
        }

        public ClassCustomer(ClassCustomer inCustomer)
        {
            Id = inCustomer.Id;
            name = inCustomer.name;
            address = inCustomer.address;
            city = inCustomer.city;
            postalCode = inCustomer.postalCode;
            country = inCustomer.country;
            phone = inCustomer.phone;
            mailAdr = inCustomer.mailAdr;
        }
        

        public string mailAdr
        {
            get { return _mailAdr; }
            set
            {
                if (_mailAdr != value)
                {
                    _mailAdr = value;
                }
                Notify("mailAdr");
            }
        }


        public string phone
        {
            get { return _phone; }
            set
            {
                if (_phone != value)
                {
                    _phone = value;
                }
                Notify("phone");
            }
        }


        public ClassCountry country
        {
            get { return _country; }
            set
            {
                if (_country != value)
                {
                    _country = value;
                }
                Notify("country");
            }
        }


        public string postalCode
        {
            get { return _postalCode; }
            set
            {
                if (_postalCode != value)
                {
                    _postalCode = value;
                }
                Notify("postalCode");
            }
        }


        public string city
        {
            get { return _city; }
            set
            {
                if (_city != value)
                {
                    _city = value;
                }
                Notify("city");
            }
        }


        public string address
        {
            get { return _address; }
            set
            {
                if (_address != value)
                {
                    _address = value;
                }
                Notify("address");
            }
        }


        public string name
        {
            get { return _name; }
            set
            {
                if (_name != value)
                {
                    _name = value;
                }
                Notify("name");
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
