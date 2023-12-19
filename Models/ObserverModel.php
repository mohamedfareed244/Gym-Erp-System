 <?php
// Observer Interface
interface Observer {
    public function update($message);
}

// Subject Interface
interface Subject {
    public function addObserver(Observer $observer);
    public function notifyObservers($message);
}
?>