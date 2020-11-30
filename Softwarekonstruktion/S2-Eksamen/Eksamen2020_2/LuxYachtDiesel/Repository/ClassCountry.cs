using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Repository
{
    /// <summary>
    /// This class works as a simple datatype containing a fields and the correlating properties.
    /// It means that this class can hold objects of the type ClassCountry, which here corresponds with our country
    /// and the data we need to be able to contain to hold an object of type ClassCountry
    /// It inherets ClassNotify, so the properties can be made with a call to the method Notify().
    /// </summary>
    public class ClassCountry : ClassNotify
    {

        private int _Id;
        private string _country;
        private string _countryCode;
        private string _currency;
        private string _currencyCode;

        public ClassCountry()
        {
            Id = 0;
            country = "";
            countryCode = "";
            currency = "";
            currencyCode = "";

        }


        public string currencyCode
        {
            get { return _currencyCode; }
            set
            {
                if (_currencyCode != value)
                {
                    _currencyCode = value;
                }
                Notify("currencyCode");
            }
        }


        public string currency
        {
            get { return _currency; }
            set
            {
                if (_currency != value)
                {
                    _currency = value;
                }
                Notify("currency");
            }
        }


        public string countryCode
        {
            get { return _countryCode; }
            set
            {
                if (_countryCode != value)
                {
                    _countryCode = value;
                }
                Notify("countryCode");
            }
        }


        public string country
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
