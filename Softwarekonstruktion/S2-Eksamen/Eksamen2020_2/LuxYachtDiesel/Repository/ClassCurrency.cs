using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using Newtonsoft.Json;

namespace Repository
{
    /// <summary>
    /// This class works as a simple datatype containing a fields and the correlating properties.
    /// It means that this class can hold objects of the type ClassCurrency, which here corresponds with our result from our API call
    /// and the data we need to be able to contain to hold an object of type ClassCurrency
    /// It inherets ClassNotify, so the properties can be made with a call to the method Notify().
    /// </summary>
    public class ClassCurrency : ClassNotify
    {

        private string _disclaimer;
        private string _license;
        private long _timestamp;
        private string _Base;
        private Dictionary<string, decimal> _rates;

        public ClassCurrency()
        {
            disclaimer = "";
            license = "";
            timestamp = 0;
            Base = "";
            rates = new Dictionary<string, decimal>();
            
        }

        public Dictionary<string, decimal> rates
        {
            get { return _rates; }
            set
            {
                if (_rates != value)
                {
                    _rates = value;
                }
                Notify("rates");
            }
        }

        [JsonProperty(PropertyName = "base")]

        public string Base
        {
            get { return _Base; }
            set
            {
                if (_Base != value)
                {
                    _Base = value;
                }
                Notify("Base");
            }
        }


        public long timestamp
        {
            get { return _timestamp; }
            set
            {
                if (_timestamp != value)
                {
                    _timestamp = value;
                }
                Notify("timestamp");
            }
        }


        public string license
        {
            get { return _license; }
            set
            {
                if (_license != value)
                {
                    _license = value;
                }
                Notify("license");
            }
        }


        public string disclaimer
        {
            get { return _disclaimer; }
            set
            {
                if (_disclaimer != value)
                {
                    _disclaimer = value;
                }
                Notify("disclaimer");
            }
        }

    }
}
