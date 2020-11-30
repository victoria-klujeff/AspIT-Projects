using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.ComponentModel;

namespace Repository
{
    public class ClassNotify : INotifyPropertyChanged
    {
        /// <summary>
        /// The goal of this class is to add functionality to all clases that inheret this class
        /// The functionality ClassNotify adds is the possibility to control the notification of an event in a Property
        /// This is made possible by ClassNotify implementing the interface INotifyPropertyChanged
        /// This interface sets the requirement that an event of the type PropertyChangedEventHandler has to be created
        /// In the method Notify this event is used to determine whether any changes has found place in the class that inherits ClasNotify
        /// If any changes has happened the instance PropertyChanged is used to initiate a transferral of data from a given property to GUI
        /// where there is created a binding with and id(the name of the property) that counterparts the name of the property that has been updated with a new value 
        /// </summary>
        public event PropertyChangedEventHandler PropertyChanged; // Implement interface by making local intance of PropertyChangedEventHandler which is attached to the class

        public ClassNotify()
        {
        }

        /// <summary>
        /// Method recieves a string which contains an ID which is the same as the property that is updated and the element in the GUI via te {Binding strCalcNumber}
        /// The ID starts to actions 
        /// A call to the property with the same name to fetch its data
        /// Broadcast ID and data to all classes which are attacted via datacontext
        /// </summary>
        /// <param name="propertyName"></param>
        protected void Notify(string propertyName)
        {
            if (PropertyChanged != null)
            {
                PropertyChanged(this, new PropertyChangedEventArgs(propertyName)); //Method which broadcast any changes to the applikation 

            }
        }
    }
}
